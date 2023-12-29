<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdmDashModel;
use App\Models\TransaksiModel;
use App\Models\TeratasModel;
use App\Models\ProdukModel;
use App\Models\PembeliModel;
use App\Models\PenjualModel;
use Illuminate\Support\Facades\DB;


class AdmDashController extends Controller
{
    public function index()
    {
        // $data['sumPenjualan'] = AdmDashModel::sumData('transaksi');
        // return view('Admin/dashboard', $data);
        return view('Admin/dashboard', [
            'penjualan' => TransaksiModel::all()->count(),
            'pendapatan' => TransaksiModel::sum('total_pembayaran'),
            'pembeli' => TransaksiModel::distinct('id_pembeli')->count('id_pembeli'),
            // 'pembeli' => TransaksiModel::(),
            'produk' => ProdukModel::all()->count(),
            'pengguna' => PembeliModel::all()->count(),
            'penjual' => PenjualModel::all()->count(),
            'teratas' => TeratasModel::orderBy('total', 'DESC')->LIMIT(5)->get(),
            'terbaru' => TransaksiModel::orderBy('created_at', 'DESC')->get(),
            'chart_penjualan' => DB::table('v_chart_penjualan')->get(),
            'chart_pendapatan' => DB::table('v_chart_pendapatan')->get()

        ]);
    }
}
