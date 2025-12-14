<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraineeProgress extends Model
{
    protected $table = 'trainee_progress';

    protected $fillable = [
        'application_id',
        'criteria_id',
        'evaluation_id',
        'notes',
        'hours',
        'achievement_level',
        'recommendation',
        'responsible',
        'action',
    ];
}
