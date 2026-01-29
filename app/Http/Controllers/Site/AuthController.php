<?php

namespace App\Http\Controllers\Site;

use App\Enums\UserStatus;
use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterRequest;
use App\Http\Requests\Site\Auth\VerifyCodeRequest;
use App\Mail\VerifyUserMail;
use App\Models\City;
use App\Models\Skill;
use App\Models\Specialization;
use App\Models\University;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register($type)
    {
        $univerisities = University::all();
        $cities = City::all();
        $specializations = Specialization::all();
        $skills = Skill::all();
        switch ($type) {
            case 'individual':
                return view('site.auth.register_individual', get_defined_vars());
                exit;
            case 'association':
                return view('site.auth.register_association', get_defined_vars());
                exit;
            case 'faculty-member':
                return view('site.auth.register_faculty_member', get_defined_vars());
                exit;
            case 'consultant':
                return view('site.auth.register_consultant', get_defined_vars());
                exit;
            default:
                return view('site.auth.register_individual', get_defined_vars());
                exit;
        }
    }

    public function handle_register(RegisterRequest $request)
    {

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('users/profile', 'public');
        }

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('users/files', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_number' => $data['id_number'] ?? null,
            'type' => $data['type'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'status' => UserStatus::PENDING,
        ]);

        $user->profile()->create([
            'image' => $data['image'] ?? null,
            'file' => $data['file'] ?? null,
        ]);

        if (! empty($data['skills'])) {
            $user->profile->skills()->sync($request->skills);
        }

        $enum_type = UserType::from($data['type']);

        $user->assignRole(Str::lower(str_replace('_', '-', $enum_type->name)));

        $code = rand(1111, 9999);
        $user->verification_code()->create(['code' => $code]);
        Mail::to($user->email)->send(new VerifyUserMail($user->name, $code));

        return view('site.auth.registration_success');
    }

    public function handle_login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return match (Auth::user()->getRoleNames()->first()) {
                'admin' => redirect()->route('admin.dashboard'),
                'individual' => redirect()->route('individual.dashboard'),
                'association' => redirect()->route('association.dashboard'),
                'faculty-member' => redirect()->route('faculty-member.dashboard'),
                'consultant' => redirect()->route('consultant.dashboard'),
                default => redirect()->route('main')
            };
        }
        throw ValidationException::withMessages(['credentials' => 'خطأ في كلمة المرور']);

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('main')->with('success', 'رافقتك السلامة');
    }

    public function notice()
    {
        if (Auth::user()->email_verified_at == null) {
            return view('site.auth.verify');
        }

        return match (Auth::user()->getRoleNames()->first()) {
            'admin' => redirect()->route('admin.dashboard'),
            'individual' => redirect()->route('individual.dashboard'),
            'association' => redirect()->route('association.dashboard'),
            'faculty-member' => redirect()->route('faculty-member.dashboard'),
            'consultant' => redirect()->route('consultant.dashboard'),
            default => redirect()->route('main')
        };
    }

    public function verify(VerifyCodeRequest $request)
    {
        $code = implode('', $request->code);
        if (Auth::user()->verification_code()->where('code', $code)->exists()) {
            Auth::user()->update(['email_verified_at' => now()]);
            Auth::user()->verification_code()->where('code', $code)->delete();

            return match (Auth::user()->getRoleNames()->first()) {
                'admin' => redirect()->route('admin.dashboard'),
                'individual' => redirect()->route('individual.dashboard')->with('success', 'تم التحقق من حسابك بنجاح'),
                'association' => redirect()->route('association.dashboard')->with('success', 'تم التحقق من حسابك بنجاح'),
                'faculty-member' => redirect()->route('faculty-member.dashboard')->with('success', 'تم التحقق من حسابك بنجاح'),
                'consultant' => redirect()->route('consultant.dashboard')->with('success', 'تم التحقق من حسابك بنجاح'),
                default => redirect()->route('main')->with('success', 'تم التحقق من حسابك بنجاح')
            };
        }
        throw ValidationException::withMessages(['invalid_code' => 'رمز التحقق غير صحيح']);
    }

    public function resend_cdoe()
    {

        if (Auth::user()->email_verified_at != null) {
            return redirect()->route('main');
        }

        Auth::user()->verification_code()->delete();
        $code = rand(1111, 9999);
        Auth::user()->verification_code()->create(['code' => $code]);
        Mail::to(Auth::user()->email)->send(new VerifyUserMail(Auth::user()->name, $code));

        return redirect()->route('verification.verify')->with('success', 'تم ارسال رمز جديد لبريدك الالكتروني');
    }

    public function reset_password()
    {
        return view('site.auth.reset_password');
    }

    public function handle_reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('success', 'تم إرسال رابط إعادة تعيين كلمة المرور إلى بريدك الإلكتروني')
            : back()->withErrors(['email' => 'فشل في إرسال رابط إعادة تعيين كلمة المرور']);
    }

    public function new_password()
    {
        return view('site.auth.new_password');
    }

    public function password_reset(Request $request, $token)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::reset(
            [
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
                'token' => $token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('main')->with('success', 'تم إعادة تعيين كلمة المرور بنجاح')
            : back()->withErrors(['email' => 'فشل في إعادة تعيين كلمة المرور']);
    }
}
