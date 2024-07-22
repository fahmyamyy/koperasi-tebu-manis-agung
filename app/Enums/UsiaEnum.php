<?php

namespace App\Enums;

enum UsiaEnum: string
{
    case A = '<31';
    case B = '31-50';
    case C = '>50';

    public function R1(): float
    {
        return match ($this) {
            UsiaEnum::A => 0.5,
            UsiaEnum::B => 0.466666667,
            UsiaEnum::C => 0.619047619,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            UsiaEnum::A => 0.5,
            UsiaEnum::B => 0.533333333,
            UsiaEnum::C => 0.380952381,
        };
    }

    public static function search(int $umur): ?self
    {
        return match (true) {
            $umur < 31 => self::A,
            $umur >= 31 && $umur <= 50 => self::B,
            $umur > 50 => self::C,
            default => null,
        };
    }
}
