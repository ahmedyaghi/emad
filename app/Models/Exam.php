<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title', 'datetime'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function examAnswers()
    {
        return $this->hasMany(ExamAnswer::class);
    }
}
