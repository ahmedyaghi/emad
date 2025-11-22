<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingOpportunity extends Model
{
    protected $fillable = ['association_id', 'type_id', 'city_id', 'title', 'slug', 'short_description', 'location', 'duration', 'attendance', 'salaray', 'responsibilities', 'conditions', 'features', 'for_male', 'for_female'];

    public function association()
    {
        return $this->belongsTo(Association::class);
    }
}
