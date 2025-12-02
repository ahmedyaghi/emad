<?php

namespace App\Enums;

enum TrainingApplicationStatus: int
{
    case APPLIED = 1;
    case REVIEWED = 2;
    case ACCEPTED = 3;
    case REJECTED = 4;

    public function label(): string
    {
        return match ($this) {
            self::APPLIED => 'تم التقديم',
            self::REVIEWED => 'قيد المراجعة',
            self::ACCEPTED => 'تم القبول',
            self::REJECTED => 'تم الرفض',
        };
    }
}
