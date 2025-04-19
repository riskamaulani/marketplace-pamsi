<?php

namespace App\Livewire\Admin;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PendapatanShop extends Component
{
    public $pendapatanPerMinggu = [];

    public function mount()
    {
        $this->updatePendapatanPerMinggu();
    }

    private function updatePendapatanPerMinggu()
    {
        $this->pendapatanPerMinggu = Shop::join('orders', 'shops.id', '=', 'orders.shop_id')
            ->select(
                'shops.name as nama_toko',
                DB::raw("YEARWEEK(orders.created_at, 1) as minggu"),
                DB::raw("DATE(orders.created_at) as tanggal"),
                DB::raw("DAYNAME(orders.created_at) as hari"),
                DB::raw("SUM(orders.total) as total_pendapatan")
            )
            ->where('orders.created_at', '>=', Carbon::now()->subWeeks(5)) // Ambil 5 minggu terakhir
            ->groupBy('shops.name', DB::raw("YEARWEEK(orders.created_at, 1)"), DB::raw("DATE(orders.created_at)"), DB::raw("DAYNAME(orders.created_at)"))
            ->orderBy(DB::raw("DATE(orders.created_at)"), 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.pendapatan-shop', [
            'pendapatanPerMinggu' => $this->pendapatanPerMinggu,
        ]);
    }
    
}
