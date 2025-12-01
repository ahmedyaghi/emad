<?php

namespace App\Enums;

enum UserStatusEnum: int
{
    case PENDING = 0;
    case ACCEPTED = 1;
    case REJECTED = 2;

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'بانتظار التفعيل',
            self::ACCEPTED => 'مقبول',
            self::REJECTED => 'مرفوض',
        };
    }
}
