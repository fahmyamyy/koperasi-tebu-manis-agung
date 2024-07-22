<?php

namespace App\Enums;

enum StatusPinjamanEnum: string
{
    case Baru = 'Baru';
    case PernahPinjam = 'Pernah Pinjam';

    public function R1(): float
    {
        return match ($this) {
            StatusPinjamanEnum::Baru => 0.541666667,
            StatusPinjamanEnum::PernahPinjam => 0.555555556,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusPinjamanEnum::Baru => 0.458333333,
            StatusPinjamanEnum::PernahPinjam => 0.444444444,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Baru' => self::Baru,
            'Pernah Pinjam' => self::PernahPinjam,
            default => null,
        };
    }
}
