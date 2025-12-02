<?php

namespace App\Models;

use App\Enums\TrainingApplicationStatus;
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

    protected function casts(): array
    {
        return [
            'status' => TrainingApplicationStatus::class,
        ];
    }

    public function getStatus()
    {
        return match ($this->status) {
            TrainingApplicationStatus::APPLIED => 'تم التقديم',
            TrainingApplicationStatus::REVIEWED => 'قيد المراجعة',
            TrainingApplicationStatus::ACCEPTED => 'تم القبول',
            TrainingApplicationStatus::REJECTED => 'تم الرفض',
            default => 'غير محدد'
        };
    }

    public function getStatusClass()
    {
        return match ($this->status) {
            TrainingApplicationStatus::APPLIED => 'submitted-bg submitted-text',
            TrainingApplicationStatus::REVIEWED => 'pending-text pending-bg',
            TrainingApplicationStatus::ACCEPTED => 'accepted-text accepted-bg',
            TrainingApplicationStatus::REJECTED => 'ended-text ended-bg',
            default => ''
        };
    }

    public function getStatusLabel()
    {
        return match ($this->status) {
            TrainingApplicationStatus::APPLIED => 'submitted',
            TrainingApplicationStatus::REVIEWED => 'pending',
            TrainingApplicationStatus::ACCEPTED => 'accepted',
            TrainingApplicationStatus::REJECTED => 'ended',
            default => ''
        };
    }

    public function getStatusText()
    {
        return match ($this->status) {
            TrainingApplicationStatus::APPLIED => 'submitted',
            TrainingApplicationStatus::REVIEWED => 'pending',
            TrainingApplicationStatus::ACCEPTED => 'accepted',
            TrainingApplicationStatus::REJECTED => 'ended',
            default => ''
        };
    }
}
