<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user with admin role
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@emadpro.com',
            'id_number' => '803218141',
            'type' => UserTypeEnum::ADMIN,
            'password' => Hash::make(123456),
        ]);

        $admin->profile()->create([]);
        $admin->assignRole('admin');

        // create user with individual role
        $individual = User::create([
            'name' => 'Individual',
            'email' => 'individual@emadpro.com',
            'id_number' => '803218142',
            'type' => UserTypeEnum::INDIVIDUAL,
            'password' => Hash::make(123456),
        ]);

        $individual->profile()->create([]);
        $individual->assignRole('individual');

        // create user with association role
        $association = User::create([
            'name' => 'Association',
            'email' => 'association@emadpro.com',
            'id_number' => '803218143',
            'type' => UserTypeEnum::ASSOCIATION,
            'password' => Hash::make(123456),
        ]);

        $association->profile()->create([]);
        $association->assignRole('association');

        // create user with faculty-member role
        $faculty_member = User::create([
            'name' => 'Faculty Member',
            'email' => 'faculty-member@emadpro.com',
            'id_number' => '803218144',
            'type' => UserTypeEnum::FACULTY_MEMBER,
            'password' => Hash::make(123456),
        ]);

        $faculty_member->profile()->create([]);
        $faculty_member->assignRole('faculty-member');

        // create user with consultant role
        $consultant = User::create([
            'name' => 'Consultant',
            'email' => 'consultant@emadpro.com',
            'id_number' => '803218145',
            'type' => UserTypeEnum::CONSULTANT,
            'password' => Hash::make(123456),
        ]);

        $consultant->profile()->create([]);
        $consultant->assignRole('consultant');
    }
}
