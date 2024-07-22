<?php

namespace App\Enums;

enum NilaiPinjamEnum: string
{
    case A = '<70';
    case B = '70-150';
    case C = '>150';

    public function R1(): float
    {
        return match ($this) {
            NilaiPinjamEnum::A => 0.826086957,
            NilaiPinjamEnum::B => 0.214285714,
            NilaiPinjamEnum::C => 0.2,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            NilaiPinjamEnum::A => 0.173913043,
            NilaiPinjamEnum::B => 0.785714286,
            NilaiPinjamEnum::C => 0.8,
        };
    }

    public static function search(float $nilai): ?self
    {
        return match (true) {
            $nilai < 70 => self::A,
            $nilai >= 70 && $nilai <= 150 => self::B,
            $nilai > 150 => self::C,
            default => null,
        };
    }
}
