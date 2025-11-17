<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(AssociationSeeder::class);
        $this->call(TrainingOpportunitySeeder::class);
        $this->call(ArticleSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'id_number' => '794876816',
        ]);

        $admin->assignRole('admin');

        $user = User::factory()->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'id_number' => '204714353',
        ]);

        $user->assignRole('user');

    }
}
