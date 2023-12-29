<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProdukModel;
use App\Models\PenjualModel;

class DetailProdukController extends Controller
{
    //

    public function detail_produk($id)
    {
        $data['produk'] = ProdukModel::where('id_produk', $id)->first();
        $data['penjual'] = PenjualModel::where('id_penjual', $id)->first();
        return view('UserBuyer/detail-product', $data);
    }
}
