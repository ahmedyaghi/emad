<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingOpportunity extends Model
{
    protected $fillable = ['association_id', 'title', 'slug', 'short_description', 'location', 'duration', 'attendance', 'salaray', 'responsibilities', 'conditions', 'features'];
}
