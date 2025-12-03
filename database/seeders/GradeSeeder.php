<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create(['name' => 'مقبول']);
        Grade::create(['name' => 'جيد']);
        Grade::create(['name' => 'جيد جدا']);
        Grade::create(['name' => 'ممتاز']);
        Grade::create(['name' => 'ممتاز جدا']);
      
    }
}
