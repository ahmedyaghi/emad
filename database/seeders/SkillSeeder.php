<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Skill::create(['name' => 'إدارة المشاريع']);
        Skill::create(['name' => 'تحليل البيانات']);
        Skill::create(['name' => 'تطوير البرمجيات']);
        Skill::create(['name' => 'التسويق الرقمي']);
        Skill::create(['name' => 'تصميم الجرافيك']);
        Skill::create(['name' => 'التصميم ثلاثي الأبعاد']);
        Skill::create(['name' => 'البرمجة']);
        Skill::create(['name' => 'التحليل الإحصائي']);
        Skill::create(['name' => 'إدارة الموارد البشرية']);
        Skill::create(['name' => 'التسويق عبر الإنترنت']);
        Skill::create(['name' => 'التصميم الجرافيكي']);
        Skill::create(['name' => 'إدارة وسائل التواصل الاجتماعي']);
        Skill::create(['name' => 'تحسين محركات البحث (SEO)']);
        Skill::create(['name' => 'إدارة الحملات الإعلانية']);
        Skill::create(['name' => 'كتابة المحتوى']);
        Skill::create(['name' => 'تحليل السوق']);
        Skill::create(['name' => 'إدارة العلامة التجارية']);
        Skill::create(['name' => 'التسويق عبر البريد الإلكتروني']);
        Skill::create(['name' => 'إدارة الفعاليات']);
        Skill::create(['name' => 'التسويق بالمحتوى']);
        Skill::create(['name' => 'إدارة العلاقات العامة']);

    }
}
