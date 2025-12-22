<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::create(['name' => 'جامعة أم القرى']);
        University::create(['name' => 'جامعة الملك عبدالعزيز']);
        University::create(['name' => 'جامعة الملك سعود']);
        University::create(['name' => 'جامعة الملك فهد للبترول والمعادن']);
        University::create(['name' => 'جامعة الإمام محمد بن سعود الإسلامية']);
        University::create(['name' => 'جامعة الطائف']);
        University::create(['name' => 'جامعة جدة']);
        University::create(['name' => 'جامعة المدينة المنورة']);
        University::create(['name' => 'جامعة تبوك']);
        University::create(['name' => 'جامعة القصيم']);
        University::create(['name' => 'جامعة حائل']);
        University::create(['name' => 'جامعة جازان']);
        University::create(['name' => 'جامعة نجران']);
        University::create(['name' => 'جامعة الباحة']);
        University::create(['name' => 'جامعة الحدود الشمالية']);
        University::create(['name' => 'جامعة الملك خالد']);
        University::create(['name' => 'جامعة الفيصل']);
        University::create(['name' => 'جامعة الأمير سلطان']);
        University::create(['name' => 'جامعة الأميرة نورة بنت عبدالرحمن']);
        University::create(['name' => 'جامعة اليمامة']);

    }
}
