<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'application_id',
        'title',
        'description',
        'file',
        'slug',
    ];

    public function application()
    {
        return $this->belongsTo(TrainingOpportunityApplication::class, 'application_id', 'id');
    }
}
