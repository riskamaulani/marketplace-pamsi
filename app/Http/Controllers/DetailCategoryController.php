<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class DetailCategoryController extends Controller
{


    public function detail_kategori($id)
    {
        $data['produk'] = ProdukModel::where('id_kategori', $id)->get();
        $data['kategori'] = KategoriModel::where('id_kategori', $id)->first();
        // $data['kategori'] = KategoriModel::find($id);
        return view('UserBuyer/detail-category', $data);
    }
}
