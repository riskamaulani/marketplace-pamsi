<?php

namespace App\Http\Controllers;

use App\Models\PenjualModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class AdmSellerController extends Controller
{
    public function penjual()
    {
        $data['penjual'] = PenjualModel::get();
        return view('Admin/data-sellers', $data);
    }
}
