<?php

namespace App\Enums;

enum TokoStatus: String
{
    case BUKA = 'buka';
    case TUTUP = 'tutup';

    public function isBuka(): bool
    {
        return $this === self::BUKA;
    }

    public function isTutup(): bool
    {
        return $this === self::TUTUP;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::BUKA => 'Buka',
            self::TUTUP => 'Tutup'
        };
    }
}
