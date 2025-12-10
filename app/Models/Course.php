<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'start_date',
        'end_date',
        'qualification_id',
        'target_id',
        'video_url',
        'image',
        'description',
        'topics',
        'goals',
        'published_at',
    ];

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function videoUrl(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (! $value) {
                    return null;
                }

                parse_str(parse_url($value, PHP_URL_QUERY), $query);

                if (isset($query['v'])) {
                    return "https://www.youtube.com/embed/{$query['v']}";
                }

                return null;
            }
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function units()
    {
        return $this->hasMany(CourseUnit::class);
    }

    public function instructors()
    {
        return $this->hasMany(CourseInstructor::class);
    }

    public function certificates()
    {
        return $this->hasMany(CourseCertificate::class);
    }

    public function lecturers()
    {
        return $this->belongsToMany(Lecturer::class);
    }

    public function progress()
    {

        $lessonIds = $this->units()->with('lessons')->get()
            ->pluck('lessons.*.id')
            ->flatten();

        $totalLessons = $lessonIds->count();

        if ($totalLessons == 0) {
            return 0;
        }

        $completedLessons = UserLessonProgress::where('user_id', auth()->id())
            ->whereIn('lesson_id', $lessonIds)
            ->where('is_completed', 1)
            ->count();

        return round(($completedLessons / $totalLessons) * 100);
    }
}
