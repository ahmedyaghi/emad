<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class TrainingOpportunity extends Model
{
    protected $fillable = [
        'association_id',
        'type_id',
        'city_id',
        'title',
        'slug',
        'salary',
        'short_description',
        'location',
        'duration',
        'attendance',
        'responsibilities',
        'conditions',
        'features',
        'for_male',
        'for_female',
        'vacancies_count',
        'start_date',
        'end_date',
        'qualification_id',
        'consultant_id',
        'faculty_member_id',
        'status',
    ];

    public function association()
    {
        return $this->belongsTo(User::class, 'association_id', 'id');
    }

    public function applications()
    {
        return $this->hasMany(TrainingOpportunityApplication::class, 'training_id', 'id');
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

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function startDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    protected function endDate(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id', 'id');
    }

    public function faculty_member()
    {
        return $this->belongsTo(User::class, 'faculty_member_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }
}
