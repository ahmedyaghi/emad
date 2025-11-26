<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUnit extends Model
{
    protected $fillable = ['course_id', 'name'];

    public function lessons()
    {
        return $this->hasMany(CourseUnitLesson::class, 'unit_id', 'id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
