<?php

namespace App\Livewire\Admin;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PendapatanShop extends Component
{
    public function render()
    {
        // Ambil pendapatan dalam seminggu terakhir dari tabel orders
        $pendapatanMinggu = Shop::select('shops.id', 'shops.name', DB::raw('SUM(orders.total) as total_pendapatan'))
            ->join('orders', 'shops.id', '=', 'orders.shop_id')
            ->where('orders.created_at', '>=', Carbon::now()->subWeek())
            ->groupBy('shops.id', 'shops.name')
            ->get();

        // Ambil pendapatan dalam sebulan terakhir dari tabel orders
        $pendapatanBulan = Shop::select('shops.id', 'shops.name', DB::raw('SUM(orders.total) as total_pendapatan'))
            ->join('orders', 'shops.id', '=', 'orders.shop_id')
            ->where('orders.created_at', '>=', Carbon::now()->subMonth())
            ->groupBy('shops.id', 'shops.name')
            ->get();

        return view('livewire.admin.pendapatan-shop', [
            'pendapatanMinggu' => $pendapatanMinggu,
            'pendapatanBulan' => $pendapatanBulan,
        ]);
    }
}
