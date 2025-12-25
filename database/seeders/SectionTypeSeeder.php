<?php

namespace Database\Seeders;

use App\Models\SectionType;
use Illuminate\Database\Seeder;

class SectionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SectionType::create(['name' => 'القطاع العام']);
        SectionType::create(['name' => 'القطاع الخاص']);
    }
}
