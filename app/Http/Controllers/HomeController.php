<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;
use App\Models\TeratasModel;
use App\Models\PenawaranModel;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['kategori'] = KategoriModel::get();
        $data['produk'] = ProdukModel::get();
        $data['teratas'] = TeratasModel::get();
        $data['penawaran'] = PenawaranModel::get();
        return view('UserBuyer/homepage', $data);
    }

    // public function detail_kategori($id)
    // {
    //     $data['produk'] = ProdukModel::where('id_kategori', $id)->get();
    //     var_dump($data['produk']);
    // }
}
