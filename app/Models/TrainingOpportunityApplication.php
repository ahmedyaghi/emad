<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingOpportunityApplication extends Model
{
    protected $fillable = ['training_id', 'user_id', 'cv', 'cover_letter', 'status'];
}
