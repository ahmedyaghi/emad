<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'association_id',
        'title',
        'slug',
        'short_description',
        'image',
        'description',
        'published_at',
    ];

    public function association()
    {
        return $this->belongsTo(User::class, 'association_id', 'id');
    }
}
