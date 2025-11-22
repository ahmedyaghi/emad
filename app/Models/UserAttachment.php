<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAttachment extends Model
{
    protected $fillable = [
        'user_id',
        'file',
        'title',
    ];
}
