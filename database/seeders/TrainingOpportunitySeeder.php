<?php

namespace Database\Seeders;

use App\Models\TrainingOpportunity;
use Illuminate\Database\Seeder;

class TrainingOpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            TrainingOpportunity::create([
                'association_id' => 1,
                'title' => 'فرصة تدريب في القطاع غير الربحي'.$i,
                'short_description' => 'اكتشف مجموعة واسعة من الفرص التي تمكنك من تطبيق معرفتك، واكتساب خبرة عملية، والمساهمة في قضايا مجتمعية مهمة.',
                'location' => 'مكة المكرمة – المنطقة المركزية ',
                'duration' => 'دوام كامل – 8 ساعات',
                'attendance' => '10 أيام (من 1 ذو الحجة حتى 10 ذو الحجة)',
                'salaray' => rand(500, 2000).' USD/month',
                'responsibilities' => 'Responsibilities for training opportunity ',
                'conditions' => 'Conditions for training opportunity ',
                'features' => 'Features of training opportunity ',
                'slug' => 'forsat-tadrib-'.$i,
            ]);
        }
    }
}
