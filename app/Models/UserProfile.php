<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'position_id',
        'nationality_id',
        'city_id',
        'country_id',
        'bio',
        'website',
        'image',
        'twitter',
        'facebook',
        'youtube',
        'age',
        'sex',
        'linkedin',
        'manager_name',
        'manager_phone',
        'manager_email',
        'date_of_birth',
        'postal_code',
        'street_name',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function getSexLabel()
    {
        return match ($this->sex) {
            1 => 'ذكر',
            2 => 'أنثى',
            default => 'غير محدد'
        };
    }
}
