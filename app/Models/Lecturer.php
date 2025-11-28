<?php

namespace App\Models;

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
}
