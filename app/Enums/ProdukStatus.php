<?php

namespace App\Enums;

enum ProdukStatus: String
{
    case TERSEDIA = 'tersedia';
    case HABIS = 'habis';

    public function isTersedia(): bool
    {
        return $this === self::TERSEDIA;
    }

    public function isHabis(): bool
    {
        return $this === self::HABIS;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::TERSEDIA => 'Tersedia',
            self::HABIS => 'Habis'
        };
    }
}
