<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'position_id',
        'company_name',
        'start_date',
        'end_date',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
