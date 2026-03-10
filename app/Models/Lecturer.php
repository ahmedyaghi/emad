<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'name',
        'image',
        'bio',
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? url('uploads/admin/courses/lecturers/'.$value) : asset('assets/images/avatar.png')
        );
    }
}
