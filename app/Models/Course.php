<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'video_url',
        'image',
        'description',
        'topics',
        'goals',
        'published_at',
    ];

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
}
