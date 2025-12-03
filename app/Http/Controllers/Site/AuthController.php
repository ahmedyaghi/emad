<?php

namespace App\Http\Controllers\Site;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterAssociationRequest;
use App\Http\Requests\Site\Auth\RegisterConsultantRequest;
use App\Http\Requests\Site\Auth\RegisterFacultyMemberRequest;
use App\Http\Requests\Site\Auth\RegisterIndividualRequest;
use App\Http\Requests\Site\Auth\VerifyCodeRequest;
use App\Mail\VerifyUserMail;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register($type)
    {
        switch ($type) {
            case 'individual':
                return view('site.auth.register_individual');
                exit;
            case 'association':
                return view('site.auth.register_association');
                exit;
            case 'faculty-member':
                return view('site.auth.register_faculty_member');
                exit;
            case 'consultant':
                return view('site.auth.register_consultant');
                exit;
            default:
                return view('site.auth.register_individual');
                exit;
        }
    }

    public function handle_register(Request $request, $type)
    {

        $enum_type = UserType::from($type);
        $type = Str::lower($enum_type->name);

        $form_request_class = match ($type) {
            'individual' => RegisterIndividualRequest::class,
            'association' => RegisterAssociationRequest::class,
            'faculty_member' => RegisterFacultyMemberRequest::class,
            'consultant' => RegisterConsultantRequest::class,
            default => throw new \InvalidArgumentException('Invalid type'),
        };

        $form_request = app($form_request_class);
        $data = $form_request->validated();

        if ($form_request->hasFile('image')) {
            $data['image'] = $form_request->file('image')->store('users/profile', 'public');
        }

        return UserService::register($data, $enum_type);
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
        //Mail::to(Auth::user()->email)->send(new VerifyUserMail(Auth::user()->name, $code));

        return redirect()->route('verification.verify')->with('success', 'تم ارسال رمز جديد لبريدك الالكتروني');
    }
}
