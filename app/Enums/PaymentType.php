<?php

namespace App\Enums;

enum PaymentType: String
{
    case cod = 'cod';
    case transfer = 'tf';
    case wallet = 'e-wallet';

    public function isSelf(): bool
    {
        return $this === self::cod;
    }

    public function isKurirKota(): bool
    {
        return $this === self::transfer;
    }

    public function isLuarKota(): bool
    {
        return $this === self::wallet;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::cod => 'COD',
            self::transfer => 'Transfer Bank NTB (xxxxxxx - Madrasah Alam Sayang Ibu)',
            self::wallet => 'E-Wallet xxx (0873xxxx - Madrasah Alam Sayang Ibu)'
        };
    }
}
