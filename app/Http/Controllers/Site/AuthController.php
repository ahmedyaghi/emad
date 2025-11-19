<?php

namespace App\Http\Controllers\Site;

use App\Enums\UserTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Auth\LoginRequest;
use App\Http\Requests\Site\Auth\RegisterAssociationRequest;
use App\Http\Requests\Site\Auth\RegisterConsultantRequest;
use App\Http\Requests\Site\Auth\RegisterFacultyMemberRequest;
use App\Http\Requests\Site\Auth\RegisterIndividualRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function handle_register_individual(RegisterIndividualRequest $request)
    {

        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_number' => $data['id_number'],
            'type' => UserTypeEnum::INDIVIDUAL,
            'phone' => $data['phone'],
            'password' => Hash::make(123456),

        ]);

        $user->profile()->create([]);
        $user->assignRole('individual');

        return view('site.auth.registration_success');
    }

    public function handle_register_association(RegisterAssociationRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'type' => UserTypeEnum::ASSOCIATION,
            'phone' => $data['phone'],
            'password' => Hash::make(123456),

        ]);

        $user->profile()->create([]);
        $user->assignRole('association');

        return view('site.auth.registration_success');
    }

    public function handle_register_faculty_member(RegisterFacultyMemberRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_number' => $data['id_number'],
            'type' => UserTypeEnum::FACULTY_MEMBER,
            'phone' => $data['phone'],
            'password' => Hash::make(123456),

        ]);

        $user->profile()->create([]);
        $user->assignRole('faculty-member');

        return view('site.auth.registration_success');
    }

    public function handle_register_consultant(RegisterConsultantRequest $request)
    {

        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_number' => $data['id_number'],
            'type' => UserTypeEnum::CONSULTANT,
            'phone' => $data['phone'],
            'password' => Hash::make(123456),

        ]);

        $user->profile()->create([]);
        $user->assignRole('consultant');

        return view('site.auth.registration_success');
    }

    public function handle_login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            return redirect()->route('individual.main')->with('success', 'مرحبا بك من جديد');
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
