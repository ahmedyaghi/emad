<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Report extends Model
{
    protected $fillable = [
        'association_id',
        'consultant_id',
        'faculty_member_id',
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

    protected function updatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->locale('ar')->translatedFormat('d F Y')
        );
    }

    public function association()
    {
        return $this->belongsTo(User::class, 'association_id', 'id');
    }

    public function consultant()
    {
        return $this->belongsTo(User::class, 'consultant_id', 'id');
    }

    public function facultyMember()
    {
        return $this->belongsTo(User::class, 'faculty_member_id', 'id');
    }

    public function getFileSizeAttribute()
    {
        if (! $this->file || ! Storage::disk('public')->exists($this->file)) {
            return '';
        }

        $bytes = Storage::disk('public')->size($this->file);

        if ($bytes >= 1048576) {
            return round($bytes / 1024 / 1024, 2).' ميجابايت';
        } elseif ($bytes >= 1024) {
            return round($bytes / 1024, 2).' كيلوبايت';
        }

        return $bytes.' بايت';
    }
}
