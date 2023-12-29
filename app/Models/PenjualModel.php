<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualModel extends Model
{
    use HasFactory;
    protected $table = "penjual";

    public function status_toko()
    {
        return $this->belongsTo(StatusTokoModel::class, 'id_status_toko', 'id_status_toko');
    }
    public function jumlah_produk()
    {
        return $this->belongsTo(JumlahProdukModel::class, 'id_penjual', 'id_penjual');
    }
}
