<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $fillable = [
        'user_id',
        'country_id',
        'position_name',
        'company_name',
        'period',
    ];
}
