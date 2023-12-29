<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukModel extends Model
{
    use HasFactory;

    protected $table = "produk";

    public function penjual()
    {
        return $this->belongsTo(PenjualModel::class, 'id_penjual', 'id_penjual');
    }
}
