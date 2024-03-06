<?php

namespace App\Enum;

enum Status
{
    const PENDING = 'pending';
    const ACCEPTED = 'accepted';
    const REJECTED = 'rejected';
    const EXPIRED = 'expired';

    public static function getStringStatus(string|int $status): string
    {
        return match ($status) {
            self::PENDING => 'pending',
            self::ACCEPTED => 'accepted',
            self::REJECTED => 'rejected',
            self::EXPIRED => 'expired'
        };
    }

    public static function getIntegerStatus(string|int $status): int
    {
        return match ($status) {
            self::PENDING => 1,
            self::ACCEPTED => 2,
            self::REJECTED => 3,
            self::EXPIRED => 4
        };
    }
}
