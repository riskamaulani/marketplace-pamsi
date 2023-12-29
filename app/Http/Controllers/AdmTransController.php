<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class AdmTransController extends Controller
{
    //
    public function transaksi()
    {
        $data['transaksi'] = TransaksiModel::orderBy('created_at', 'DESC')->get();

        return view('Admin/data-transactions', $data);
    }
}
