<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            News::create([
                'association_id' => 1,
                'title' => 'خبر تجريبي رقم '.$i,
                'short_description' => 'هذا وصف مختصر للخبر التجريبي رقم '.$i,
                'description' => '<p>هذا هو المحتوى الكامل للخبر التجريبي رقم '.$i.'. هنا يمكنك إضافة نصوص، صور، وروابط حسب الحاجة.</p>',
                'published_at' => now()->subDays(5 - $i),
                'slug' => Str::slug('خبر تجريبي رقم '.$i, '-'),
            ]);
        }
    }
}
