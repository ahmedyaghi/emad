<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::url($value) : asset('assets/images/image.png')
        );
    }
}
