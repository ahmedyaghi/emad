<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'email_verified_at',
        'id_number',
        'phone',
        'type',
        'image',
        'country_id',

    ];

    protected $appends = ['full_image_path'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function verification_code()
    {
        return $this->hasOne(VerificationCode::class);
    }

    public function supporters()
    {
        return $this->hasMany(Supporter::class);
    }

    public function getType()
    {
        return match ($this->type) {
            1 => 'متطوع',
            2 => 'مستفيد',
            3 => 'داعم',
            default => 'غير محدد'
        };
    }

    public function getTypeClass()
    {
        return match ($this->type) {
            1 => 'badge-success',
            2 => 'badge-danger',
            3 => 'badge-warning',
            default => 'badge-success'
        };
    }

    public function getFullImagePathAttribute()
    {
        if (empty($this->image)) {
            return url('admin/images/upload.png');
        }

        return url('uploads/users/'.$this->image);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function getVerified()
    {
        if (! is_null($this->email_verified_at)) {
            return 'مفعل';
        }

        return 'غير مفعل';
    }

    public function getVerifiedClass()
    {
        if (! is_null($this->email_verified_at)) {
            return 'badge-success';
        }

        return 'badge-danger';
    }
}
