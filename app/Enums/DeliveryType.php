<?php

namespace App\Enums;

enum DeliveryType: String
{
    case self = 'ambilSendiri';
    case kurirKota = 'kurirKota';
    case luarKota = 'luarKota';

    public function isSelf(): bool
    {
        return $this === self::self;
    }

    public function isKurirKota(): bool
    {
        return $this === self::kurirKota;
    }

    public function isLuarKota(): bool
    {
        return $this === self::luarKota;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::self => 'Ambil Sendiri',
            self::kurirKota => 'Via Kurir (Daerah Mataram) Rp10.000',
            self::luarKota => 'Luar Kota Mataram Hubungi Admin (08xxxxxxx - Madrasah Alam Sayang Ibu)'
        };
    }
}
