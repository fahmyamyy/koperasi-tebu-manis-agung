<?php

namespace App\Enums;

enum StatusPerkawinanEnum: string
{
    case Menikah = 'Menikah';
    case Lajang = 'Lajang';

    public function R1(): float
    {
        return match ($this) {
            StatusPerkawinanEnum::Menikah => 0.552631579,
            StatusPerkawinanEnum::Lajang => 0.5,
        };
    }

    public function R2(): float
    {
        return match ($this) {
            StatusPerkawinanEnum::Menikah => 0.447368421,
            StatusPerkawinanEnum::Lajang => 0.5,
        };
    }

    public static function search(string $status): ?self
    {
        return match ($status) {
            'Menikah' => self::Menikah,
            'Lajang' => self::Lajang,
            default => null,
        };
    }
}
