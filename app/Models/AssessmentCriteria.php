<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssessmentCriteria extends Model
{
    protected $fillable = [
        'assessment_id',
        'criteria_id',
        'evaluation_id',
        'notes',
        'type',
        'weight_percentage',
        'achievement_level',
        'recommendations',
        'responsible_side',
        'action_required',
    ];

    public function criteria()
    {
        return $this->belongsTo(GeneralCriteria::class);
    }

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
}
