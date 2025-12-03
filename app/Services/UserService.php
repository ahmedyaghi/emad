<?php

namespace App\Services;

use App\Enums\UserStatus;
use App\Mail\VerifyUserMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService
{
    public static function register($data, $type)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'id_number' => $data['id_number'] ?? null,
            'type' => $type->value,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'status' => UserStatus::PENDING,
        ]);

        $user->profile()->create([
            'image' => $data['image'] ?? null,
        ]);
        $user->assignRole(Str::lower(str_replace('_', '-', $type->name)));

        $code = rand(1111, 9999);
        $user->verification_code()->create(['code' => $code]);
       // Mail::to($user->email)->send(new VerifyUserMail($user->name, $code));

        return view('site.auth.registration_success');
    }
}
