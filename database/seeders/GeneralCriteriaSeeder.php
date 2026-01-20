<?php

namespace Database\Seeders;

use App\Models\GeneralCriteria;
use Illuminate\Database\Seeder;

class GeneralCriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralCriteria::create(['title' => 'الالتزام بالحضور والانصراف', 'type' => 1]);
        GeneralCriteria::create(['title' => 'اللباقة والتواصل', 'type' => 1]);
        GeneralCriteria::create(['title' => 'المبادرة والمشاركة', 'type' => 1]);
        GeneralCriteria::create(['title' => 'حسن التعامل مع المستفيدين', 'type' => 1]);
        GeneralCriteria::create(['title' => 'احترام السياسات الداخلية', 'type' => 1]);
        GeneralCriteria::create(['title' => 'الالتزام بالمظهر والسلوك العام', 'type' => 1]);
        GeneralCriteria::create(['title' => 'الانضباط في أداء وتسليم المهمة', 'type' => 2]);
        GeneralCriteria::create(['title' => 'الابتكار في حل المشكلات', 'type' => 2]);
        GeneralCriteria::create(['title' => 'جودة المخرجات', 'type' => 2]);
        GeneralCriteria::create(['title' => 'العمل الجماعي', 'type' => 2]);
        GeneralCriteria::create(['title' => 'تحمل المسؤولية', 'type' => 2]);
        GeneralCriteria::create(['title' => 'مهارات العرض', 'type' => 3]);
        GeneralCriteria::create(['title' => 'المبادرة الذاتية', 'type' => 3]);
    }
}
