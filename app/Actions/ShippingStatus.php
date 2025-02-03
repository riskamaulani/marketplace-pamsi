<?php

namespace App\Actions;

class ShippingStatus
{
    public static function handle(string $data)
    {
        if($data == 'done') return "Selesai";
        if($data == 'shipping') return "Dikirim";
        return "Diproses";
    }
}
