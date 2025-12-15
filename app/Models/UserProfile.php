<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'gender',
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

    public function getGenderLabel()
    {
        return match ($this->gender) {
            1 => 'ذكر',
            2 => 'أنثى',
            default => 'غير محدد'
        };
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? Storage::url($value) : asset('assets/images/avatar.png')
        );
    }
}
