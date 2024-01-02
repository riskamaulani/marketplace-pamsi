<?php

namespace App\Enums;

enum UserStatus: String
{
    case ADMIN = 'admin';
    case PEMBELI = 'pembeli';
    case PENJUAL = 'penjual';

    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }

    public function isPembeli(): bool
    {
        return $this === self::PEMBELI;
    }

    public function isPenjual(): bool
    {
        return $this === self::PENJUAL;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::ADMIN => 'Admin',
            self::PEMBELI => 'Pembeli',
            self::PENJUAL => 'Penjual'
        };
    }
}
