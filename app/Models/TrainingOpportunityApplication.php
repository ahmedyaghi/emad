<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingOpportunityApplication extends Model
{
    protected $fillable = ['training_id', 'user_id', 'cv', 'cover_letter', 'status', 'slug'];

    public function training()
    {
        return $this->belongsTo(TrainingOpportunity::class, 'training_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatus()
    {
        return match ($this->status) {
            1 => 'تم التقديم',
            2 => 'قيد المراجعة',
            3 => 'تم القبول المبدئي',
            4 => 'تم القبول',
            default => 'غير محدد'
        };
    }

    public function getStatusClass()
    {
        return match ($this->status) {
            1 => 'submitted-bg submitted-text',
            2 => 'pending-text pending-bg',
            3 => 'status-preliminary',
            4 => 'accepted-text accepted-bg',
            default => ''
        };
    }

    public function getStatusLabel()
    {
        return match ($this->status) {
            1 => 'submitted',
            2 => 'pending',
            3 => 'preliminary',
            4 => 'accepted',
            default => ''
        };
    }

    public function getStatusText()
    {
        return match ($this->status) {
            1 => '>🎉 تهانينا، تم قبولك! لقد تم قبولك نهائيًا.',
            2 => 'pending',
            3 => 'preliminary',
            4 => 'accepted',
            default => ''
        };
    }
}
