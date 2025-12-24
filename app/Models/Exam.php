<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Exam extends Model
{
    protected $fillable = ['title', 'datetime'];

    protected $casts = [
        'datetime' => 'datetime',
    ];

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

    protected function canStart(): Attribute
    {
        return Attribute::make(
            get: function () {
                $now = Carbon::now();

                // نفترض أن كل Exam مرتبط بكورس واحد فقط عند المستخدم الحالي
                $course = $this->courses()->whereHas('users', function ($q) {
                    $q->where('users.id', auth()->id());
                })->first();

                if (! $course) {
                    return false;
                }

                $examDate = Carbon::parse($this->datetime)->startOfDay();
                $examEnd = Carbon::parse($this->datetime)->endOfDay();

                return $now->between($examDate, $examEnd)
                    && $course->progress() == 100
                    && $this->examAnswers->isEmpty();
            }
        );
    }

    protected function totalScore(): Attribute
    {
        return Attribute::make(
            get: function () {
                return $this->examAnswers->sum('score');
            }
        );
    }

    protected function achievedScore(): Attribute
    {
        return Attribute::make(
            get: function () {
                $userId = Auth::id();

                return $this->examAnswers
                    ->where('user_id', $userId)
                    ->where('is_correct', 1)
                    ->sum('score');
            }
        );
    }
}
