<?php

namespace App\Enums;

enum JangkaWaktuEnum: string
{
    case A = '<5';
    case B = '5-8';
    case C = '>8';

    public function R1(): float
    {
        return match ($this) {
            JangkaWaktuEnum::A => 0.352941176,
            JangkaWaktuEnum::B => 0.736842105,
            JangkaWaktuEnum::C => 0.5,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            JangkaWaktuEnum::A => 0.647058824,
            JangkaWaktuEnum::B => 0.263157895,
            JangkaWaktuEnum::C => 0.5,
        };
    }

    public static function search(float $waktu): ?self
    {
        return match (true) {
            $waktu < 5 => self::A,
            $waktu >= 5 && $waktu <= 8 => self::B,
            $waktu > 8 => self::C,
            default => null,
        };
    }
}
