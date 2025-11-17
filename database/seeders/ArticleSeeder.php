<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Article::create([
                'association_id' => 1,
                'title' => 'مقال تجريبي رقم '.$i,
                'short_description' => 'هذا وصف مختصر للمقال التجريبي رقم '.$i,
                'description' => '<p>هذا هو المحتوى الكامل للمقال التجريبي رقم '.$i.'. هنا يمكنك إضافة نصوص، صور، وروابط حسب الحاجة.</p>',
                'published_at' => now()->subDays(5 - $i),
                'slug' => Str::slug('مقال تجريبي رقم '.$i, '-'),
            ]);
        }

    }
}
