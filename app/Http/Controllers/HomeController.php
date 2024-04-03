<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\ProdukModel;

use App\Models\TeratasModel;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\PenawaranModel;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KategoriController;
use App\Models\Produk;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    public function index()
    {
        return match (Auth::user()->status) {
            UserStatus::ADMIN => $this->homeAdmin(),
            UserStatus::PEMBELI => $this->homePembeli(),
            UserStatus::PENJUAL => $this->homePenjual()
        };
    }

    private function homeAdmin()
    {
        return view('pages.admin.dashboard', [
            'penjualan' => 5,
            'pendapatan' => 5,
            'pembeli' => 5,
            // 'pembeli' => TransaksiModel::(),
            'produk' => 5,
            'pengguna' => 5,
            'penjual' => 5,
            'teratas' => [],
            'terbaru' => [],
            'chart_penjualan' => [],
            'chart_pendapatan' => []

        ]);
    }

    private function homePembeli()
    {
        $data['kategori']  = Kategori::all();;
        $data['produk']   = Produk::all();
        $data['teratas']   = [];
        $data['penawaran'] = [];
        
        $currentDayIndex = Carbon::now()->dayOfWeek;
        $penawaran = Produk::with('toko')
        ->whereHas('toko', function ($query) use ($currentDayIndex) {
            $query->whereRaw("JSON_EXTRACT(buka, '$[$currentDayIndex]') = 'true'");
        })
        ->get();
        

        $data['penawaran'] = $penawaran;
        
        
        return view('pages.buyer.homepage', $data);
    }

    private function homePenjual()
    {
        return view('pages.seller.dashboard', [
            'pendapatan' => [],
        ]);
    }
}
