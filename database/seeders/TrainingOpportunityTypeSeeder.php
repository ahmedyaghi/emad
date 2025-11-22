<?php

namespace Database\Seeders;

use App\Models\TrainingOpportunityType;
use Illuminate\Database\Seeder;

class TrainingOpportunityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrainingOpportunityType::create(['title' => 'تقنية']);
        TrainingOpportunityType::create(['title' => 'إدارية']);
        TrainingOpportunityType::create(['title' => 'مهنية']);

    }
}
