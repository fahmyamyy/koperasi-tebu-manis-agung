<?php

namespace App\Enums;

enum PengahasilanPanenEnum: string
{
    case A = '<50';
    case B = '50-180';
    case C = '>180';

    public function R1(): float
    {
        return match ($this) {
            PengahasilanPanenEnum::A => 0.555555556,
            PengahasilanPanenEnum::B => 0.454545455,
            PengahasilanPanenEnum::C => 0.727272727,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            PengahasilanPanenEnum::A => 0.444444444,
            PengahasilanPanenEnum::B => 0.545454545,
            PengahasilanPanenEnum::C => 0.272727273,
        };
    }

    public static function search(float $panen): ?self
    {
        return match (true) {
            $panen < 50 => self::A,
            $panen >= 50 && $panen <= 180 => self::B,
            $panen > 180 => self::C,
            default => null,
        };
    }
}
