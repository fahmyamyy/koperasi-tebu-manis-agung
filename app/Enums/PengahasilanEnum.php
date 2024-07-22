<?php

namespace App\Enums;

enum PengahasilanEnum: string
{
    case A = '<5';
    case B = '5-12';
    case C = '>12';

    public function R1(): float
    {
        return match ($this) {
            PengahasilanEnum::A => 0.571428571,
            PengahasilanEnum::B => 0.5,
            PengahasilanEnum::C => 0.6,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            PengahasilanEnum::A => 0.428571429,
            PengahasilanEnum::B => 0.5,
            PengahasilanEnum::C => 0.4,
        };
    }

    public static function search(float $penghasilan): ?self
    {
        return match (true) {
            $penghasilan < 5 => self::A,
            $penghasilan >= 5 && $penghasilan <= 12 => self::B,
            $penghasilan > 12 => self::C,
            default => null,
        };
    }
}
