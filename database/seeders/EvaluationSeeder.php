<?php

namespace Database\Seeders;

use App\Models\Evaluation;
use Illuminate\Database\Seeder;

class EvaluationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evaluation::create(['title' => 'ممتاز']);
        Evaluation::create(['title' => 'جيد جدا']);
        Evaluation::create(['title' => 'جيد']);
        Evaluation::create(['title' => 'مقبول']);
    }
}
