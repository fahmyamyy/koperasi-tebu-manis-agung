<?php

namespace App\Enums;

enum PinjamanSebelumnyaEnum: string
{
    case Lancar = 'Lancar';
    case Macet = 'Macet';

    public function R1(): float
    {
        return match ($this) {
            PinjamanSebelumnyaEnum::Lancar => 0.6,
            PinjamanSebelumnyaEnum::Macet => 0.416666667,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            PinjamanSebelumnyaEnum::Lancar => 0.4,
            PinjamanSebelumnyaEnum::Macet => 0.583333333,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Lancar' => self::Lancar,
            'Macet' => self::Macet,
            default => null,
        };
    }
}
