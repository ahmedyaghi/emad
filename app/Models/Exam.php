<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = ['title'];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
