<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingOpportunity extends Model
{
    protected $fillable = ['association_id', 'type_id', 'city_id', 'title', 'slug', 'salary',
        'short_description', 'location', 'duration', 'attendance',  'responsibilities', 'conditions', 'features', 'for_male', 'for_female',
        'vacancies_count', 'start_date', 'end_date', 'qualification_id', 'status',
    ];

    public function association()
    {
        return $this->belongsTo(User::class, 'association_id', 'id');
    }

    public function getStatus()
    {
        return match ($this->status) {
            1 => 'نشرت',
            2 => 'انتهت',
            default => 'غير محدد'
        };
    }

    public function getStatusClass()
    {
        return match ($this->status) {
            1 => 'accepted-text accepted-bg',
            2 => 'ended-text ended-bg',
            default => ''
        };
    }
}
