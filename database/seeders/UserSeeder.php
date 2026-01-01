<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enums\UserType;
use App\Enums\UserStatus;
use Illuminate\Database\Seeder;
use Symfony\Component\Clock\now;

use Illuminate\Support\Facades\HashClock\now;

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
            'type' => UserType::ADMIN,
            'password' => Hash::make(123456),
            'status' => UserStatus::ACCEPTED,
            'email_verified_at' => now(),
        ]);

        $admin->profile()->create([]);
        $admin->assignRole('admin');

        // create user with individual role
        $individual = User::create([
            'name' => 'Individual',
            'email' => 'individual@emadpro.com',
            'id_number' => '803218142',
            'type' => UserType::INDIVIDUAL,
            'password' => Hash::make(123456),
            'status' => UserStatus::ACCEPTED,
            'email_verified_at' => now(),
        ]);

        $individual->profile()->create([]);
        $individual->assignRole('individual');

        // create user with association role
        $association = User::create([
            'name' => 'Association',
            'email' => 'association@emadpro.com',
            'id_number' => '803218143',
            'type' => UserType::ASSOCIATION,
            'password' => Hash::make(123456),
            'status' => UserStatus::ACCEPTED,
            'email_verified_at' => now(),
        ]);

        $association->profile()->create([]);
        $association->assignRole('association');

        // create user with faculty-member role
        $faculty_member = User::create([
            'name' => 'Faculty Member',
            'email' => 'faculty-member@emadpro.com',
            'id_number' => '803218144',
            'type' => UserType::FACULTY_MEMBER,
            'password' => Hash::make(123456),
            'status' => UserStatus::ACCEPTED,
            'email_verified_at' => now(),
        ]);

        $faculty_member->profile()->create([]);
        $faculty_member->assignRole('faculty-member');

        // create user with consultant role
        $consultant = User::create([
            'name' => 'Consultant',
            'email' => 'consultant@emadpro.com',
            'id_number' => '803218145',
            'type' => UserType::CONSULTANT,
            'password' => Hash::make(123456),
            'status' => UserStatus::ACCEPTED,
            'email_verified_at' => now(),
        ]);

        $consultant->profile()->create([]);
        $consultant->assignRole('consultant');
    }
}
