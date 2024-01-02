<?php

namespace App\Enums;

enum TransaksiStatus: String
{
    case KONFIRMASI = 'konfirmasi';
    case BATAL = 'dibatalkan';
    case PROSES = 'diproses';
    case KIRIM = 'dikirim';
    case SELESAI = 'selesai';

    public function isKonfirmasi(): bool
    {
        return $this === self::KONFIRMASI;
    }

    public function isBatal(): bool
    {
        return $this === self::BATAL;
    }

    public function isProses(): bool
    {
        return $this === self::PROSES;
    }

    public function isKirim(): bool
    {
        return $this === self::KIRIM;
    }

    public function isSelesai(): bool
    {
        return $this === self::SELESAI;
    }

    public function getLabelText(): String
    {
        return match($this) {
            self::KONFIRMASI => 'Menunggu Pembayaran',
            self::BATAL => 'Pesanan Dibatalkan',
            self::PROSES => 'Pesanan Diproses',
            self::KIRIM => 'Sedang Dikirim',
            self::SELESAI => 'Pesanan Selesai',
        };
    }
}
