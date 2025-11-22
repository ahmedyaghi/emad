<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make(123456),

        ]);

        $user->profile()->create([]);
        $user->assignRole(Str::lower(str_replace('_', '-', $type->name)));

        return view('site.auth.registration_success');
    }
}
