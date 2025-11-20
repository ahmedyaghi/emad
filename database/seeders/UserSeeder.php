<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create user with admin role
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@emadpro.com',
            'id_number' => '803218141',
            'type' => UserTypeEnum::ADMIN,
        ]);

        $admin->profile()->create([]);
        $admin->assignRole('admin');

        // create user with individual role
        $individual = User::factory()->create([
            'name' => 'Individual',
            'email' => 'individual@emadpro.com',
            'id_number' => '803218142',
            'type' => UserTypeEnum::INDIVIDUAL,
        ]);

        $individual->profile()->create([]);
        $individual->assignRole('individual');

        // create user with association role
        $association = User::factory()->create([
            'name' => 'Association',
            'email' => 'association@emadpro.com',
            'id_number' => '803218143',
            'type' => UserTypeEnum::ASSOCIATION,
        ]);

        $association->profile()->create([]);
        $association->assignRole('association');

        // create user with faculty-member role
        $faculty_member = User::factory()->create([
            'name' => 'Faculty Member',
            'email' => 'faculty-member@emadpro.com',
            'id_number' => '803218144',
            'type' => UserTypeEnum::FACULTY_MEMBER,
        ]);

        $faculty_member->profile()->create([]);
        $faculty_member->assignRole('faculty-member');

        // create user with consultant role
        $consultant = User::factory()->create([
            'name' => 'Consultant',
            'email' => 'consultant@emadpro.com',
            'id_number' => '803218145',
            'type' => UserTypeEnum::CONSULTANT,
        ]);

        $consultant->profile()->create([]);
        $consultant->assignRole('consultant');
    }
}
