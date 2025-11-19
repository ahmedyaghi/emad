<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'individual']);
        Role::create(['name' => 'association']);
        Role::create(['name' => 'faculty-member']);
        Role::create(['name' => 'consultant']);
    }
}
