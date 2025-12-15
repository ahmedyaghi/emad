<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'application_id',
        'name',
        'description',
        'status',
    ];

    public function application()
    {
        return $this->belongsTo(TrainingOpportunityApplication::class, 'application_id', 'id');
    }

    public function criterias()
    {
        return $this->hasMany(AssessmentCriteria::class);
    }

    public function tasks()
    {
        return $this->hasMany(AssessmentTask::class);
    }
}
