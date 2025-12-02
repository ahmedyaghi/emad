<?php

namespace App\Http\Controllers\Site;

use App\Enums\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterAssociationRequest;
use App\Http\Requests\Site\Auth\RegisterConsultantRequest;
use App\Http\Requests\Site\Auth\RegisterFacultyMemberRequest;
use App\Http\Requests\Site\Auth\RegisterIndividualRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
