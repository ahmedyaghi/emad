<?php

namespace Database\Seeders;

use App\Models\TrainingOpportunityType;
use Illuminate\Database\Seeder;

class TrainingOpportunityTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'إداري',
            'تقني',
            'ميداني',
            'مالي ومحاسبي',
            'قانوني',
            'إعلامي وعلاقات عامة',
            'تسويقي',
            'موارد بشرية',
            'بحوث ودراسات',
            'تعليمي وتدريبي',
            'صحي',
            'اجتماعي',
            'هندسي',
            'تشغيلي ولوجستي',
            'تقنية معلومات',
            'خدمة مستفيدين',
            'قيادي وإشرافي',
            'مكتبي',
            'إدارة مشاريع',
            'جمع تبرعات / تنمية موارد',
            'إدارة المتطوعين',
            'تحليل بيانات',
            'قياس أثر',
            'ابتكار خدمات',
            'مسؤول استثمار اجتماعي',
            'أخرى',
        ];

        foreach ($types as $type) {
            TrainingOpportunityType::create([
                'title' => $type,
            ]);
        }
    }
}
