<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseUnitLesson extends Model
{
    protected $fillable = ['unit_id', 'video_url', 'title', 'content', 'duration'];
}
