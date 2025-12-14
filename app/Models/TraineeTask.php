<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TraineeTask extends Model
{

    protected $fillable = [
        'application_id',
        'evaluation_id',
        'name',
        'description',
        'number_of_hours',
        'achievement_level',
        'notes',
    ];
}
