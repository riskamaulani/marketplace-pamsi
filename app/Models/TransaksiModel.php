<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = "transaksi";

    public function pembeli()
    {
        return $this->belongsTo(PembeliModel::class, 'id_pembeli', 'id_pembeli');
    }
    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'id_produk', 'id_produk');
    }
    public function status()
    {
        return $this->belongsTo(StatusPesananModel::class, 'status_pesanan', 'id_status_pesanan');
    }
    public function pengiriman()
    {
        return $this->belongsTo(PengirimanModel::class, 'id_pengiriman', 'id_pengiriman');
    }
}
