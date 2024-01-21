<?php

namespace App\Enums;

enum ProdukOrderType: String
{
    case PO = 'pre-order';
    case READY = 'ready';

    public function isPO(): bool
    {
        return $this === self::PO;
    }

    public function isReady(): bool
    {
        return $this === self::READY;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::PO => 'Pre-Order',
            self::READY => 'Ready Stok'
        };
    }
}
