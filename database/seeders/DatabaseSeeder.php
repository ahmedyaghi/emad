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
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(TrainingOpportunityTypeSeeder::class);
        $this->call(AssociationSeeder::class);
        $this->call(TrainingOpportunitySeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(QualificationSeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(BankSeeder::class);

    }
}
