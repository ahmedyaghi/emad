<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['name', 'type_id', 'score', 'exam_id'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function exam()
    {
        return $this->belongsTo(Question::class);
    }
}
