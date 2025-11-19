<?php

namespace App\Enums;

enum UserTypeEnum: int
{
    case ADMIN = 1;
    case INDIVIDUAL = 2;
    case ASSOCIATION = 3;
    case FACULTY_MEMBER = 4;
    case CONSULTANT = 5;

    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'آدمن',
            self::INDIVIDUAL => 'فرد',
            self::ASSOCIATION => 'جمعية',
            self::FACULTY_MEMBER => 'عضو تدريس',
            self::CONSULTANT => 'مستشار',
        };
    }
}
