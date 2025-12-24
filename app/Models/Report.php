<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }
}
