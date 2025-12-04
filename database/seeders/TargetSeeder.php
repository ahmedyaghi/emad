<?php

namespace Database\Seeders;

use App\Models\Target;
use Illuminate\Database\Seeder;

class TargetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Target::create(['name' => 'ذكور']);
        Target::create(['name' => 'إناث']);
        Target::create(['name' => 'ذكور وإناث']);
    }
}
