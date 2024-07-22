<?php

namespace App\Enums;

enum LuasLahanEnum: string
{
    case A = '<3';
    case B = '3-5';
    case C = '>5';

    public function R1(): float
    {
        return match ($this) {
            LuasLahanEnum::A => 0.5,
            LuasLahanEnum::B => 0.538461538,
            LuasLahanEnum::C => 0.833333333,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            LuasLahanEnum::A => 0.5,
            LuasLahanEnum::B => 0.461538462,
            LuasLahanEnum::C => 0.166666667,
        };
    }

    public static function search(float $luas): ?self
    {
        return match (true) {
            $luas < 3 => self::A,
            $luas >= 3 && $luas <= 5 => self::B,
            $luas > 5 => self::C,
            default => null,
        };
    }
}
