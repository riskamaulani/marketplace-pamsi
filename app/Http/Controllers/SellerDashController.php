<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class SellerDashController extends Controller
{
    // public function pendapatanSeller($id)
    // {
    //     $pendapatan = TransaksiModel::where('id_penjual', $id)->get();
    //     return view('UserSeller/seller-dashboard', compact('pendapatan'));
    // }
    public function index($id)
    {
        return view('UserSeller/seller-dashboard', [
            'pendapatan' => TransaksiModel::where('id_penjual', $id)->get(),
        ]);
    }
}
