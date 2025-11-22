<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCertificate extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'file',
    ];
}
