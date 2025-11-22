<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    protected $fillable = ['user_id', 'qualification_id', 'university_id', 'specialization_id', 'graduation_year', 'graduation_grade'];
}
