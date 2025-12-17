<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQualification extends Model
{
    protected $fillable = ['user_id', 'qualification_id', 'university_id', 'specialization_id', 'graduation_year', 'grade_id'];

    public function qualification()
    {
        return $this->belongsTo(Qualification::class);
    }

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
