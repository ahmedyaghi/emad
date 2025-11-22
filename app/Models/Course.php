<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'video_url',
        'image',
        'description',
        'topics',
        'goals',
        'published_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
