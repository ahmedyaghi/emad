<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title',
        'type_id',
        'send_from',
        'send_to',
        'description',
        'file',
    ];

    public function type()
    {
        return $this->belongsTo(NoteType::class, 'type_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'send_from');
    }
}
