<?php

namespace App\Enums;

enum StatusKeanggotaanEnum: string
{
    case Pengurus = 'Pengurus';
    case Pengawas = 'Pengawas';
    case Anggota = 'Anggota';

    public function R1(): float
    {
        return match ($this) {
            StatusKeanggotaanEnum::Pengurus => 0.6,
            StatusKeanggotaanEnum::Pengawas => 0.666666667,
            StatusKeanggotaanEnum::Anggota => 0.529411765,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusKeanggotaanEnum::Pengurus => 0.4,
            StatusKeanggotaanEnum::Pengawas => 0.333333333,
            StatusKeanggotaanEnum::Anggota => 0.470588235,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Pengurus' => self::Pengurus,
            'Pengawas' => self::Pengawas,
            'Anggota' => self::Anggota,
            default => null,
        };
    }
}
