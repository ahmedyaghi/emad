<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 1; $i <= 5; $i++) {
            $course = Course::create([
                'title' => 'دورة في القطاع غير الربحي'.$i,
                'short_description' => 'اكتشف مجموعة واسعة من الفرص التي تمكنك من تطبيق معرفتك، واكتساب خبرة عملية، والمساهمة في قضايا مجتمعية مهمة.',
                'description' => 'اكتشف مجموعة واسعة من الفرص التي تمكنك من تطبيق معرفتك، واكتساب خبرة عملية، والمساهمة في قضايا مجتمعية مهمة.',
                'topics' => 'topics ',
                'goals' => 'goals ',
                'slug' => 'course-'.$i,
                'published_at' => now(),
            ]);
            $course->lecturers()->attach([1]);
            for ($j = 1; $j <= 5; $j++) {
                $course_unit = $course->units()->create(['name' => 'الوحدة'.$j]);
                for ($k = 1; $k <= 5; $k++) {
                    $course_unit->lessons()->create([
                        'video_url' => '.....',
                        'title' => 'الدرس  '.$k,
                        'content' => 'asd',
                        'duration' => '(24:32)',
                    ]);
                }
            }

        }
    }
}
