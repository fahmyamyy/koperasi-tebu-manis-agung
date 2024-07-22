<?php

namespace App\Enums;

enum JenisPembayaranEnum: string
{
    case Angsuran = 'Angsuran';
    case Potongan = 'Potongan';

    public function R1(): float
    {
        return match ($this) {
            JenisPembayaranEnum::Angsuran => 0.7,
            JenisPembayaranEnum::Potongan => 0.409090909,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            JenisPembayaranEnum::Angsuran => 0.3,
            JenisPembayaranEnum::Potongan => 0.590909091,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Angsuran' => self::Angsuran,
            'Potongan' => self::Potongan,
            default => null,
        };
    }
}
