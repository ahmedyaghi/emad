<?php

namespace Database\Seeders;

use App\Models\NoteType;
use Illuminate\Database\Seeder;

class NoteTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NoteType::create(['type' => 'تربوية']);
        NoteType::create(['type' => 'تنظيمية']);
        NoteType::create(['type' => 'سلوكية']);
        NoteType::create(['type' => 'إدارية']);
        NoteType::create(['type' => 'اقتراح تطويري']);
    }
}
