<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class UserAttachment extends Model
{
    protected $fillable = [
        'user_id',
        'file',
        'title',
    ];

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::url($value) : null
        );
    }
}
