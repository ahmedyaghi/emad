<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentTask extends Model
{
    protected $fillable = [
        'assessment_id',
        'name',
        'date',
        'description',
        'number_of_hours',
        'achievement_level',
        'notes',
    ];
}
