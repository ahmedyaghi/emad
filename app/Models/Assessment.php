<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }
}
