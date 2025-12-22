<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Seeder;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Specialization::create(['name' => 'إدارة أعمال']);
        Specialization::create(['name' => 'هندسة']);
        Specialization::create(['name' => 'علوم الحاسوب']);
        Specialization::create(['name' => 'الطب']);
        Specialization::create(['name' => 'القانون']);
        Specialization::create(['name' => 'التربية']);
        Specialization::create(['name' => 'العلوم الاجتماعية']);
        Specialization::create(['name' => 'الاقتصاد']);
        Specialization::create(['name' => 'الفنون الجميلة']);
        Specialization::create(['name' => 'العلوم البيئية']);
        Specialization::create(['name' => 'الصيدلة']);
        Specialization::create(['name' => 'التمريض']);
        Specialization::create(['name' => 'العلوم السياسية']);
        Specialization::create(['name' => 'اللغات والترجمة']);
        Specialization::create(['name' => 'السياحة والفندقة']);
        Specialization::create(['name' => 'الزراعة']);
        Specialization::create(['name' => 'الفيزياء']);
        Specialization::create(['name' => 'الكيمياء']);
        Specialization::create(['name' => 'الرياضيات']);
        Specialization::create(['name' => 'العلوم الصحية']);

    }
}
