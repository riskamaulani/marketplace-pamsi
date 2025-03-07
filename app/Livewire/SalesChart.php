<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class SalesChart extends Component
{
    public $filter = 'yearly'; // Default: Per Bulan
    public $shopId; // ID Toko
    public $productNames = [];
    public $salesData = [];

    public function mount($shopId)
    {
        $this->shopId = $shopId;
        $this->loadData();
        
        // Pastikan data awal langsung dikirim ke JavaScript setelah Livewire siap
        $this->dispatch('updateChart', productNames: $this->productNames, salesData: $this->salesData);
    }

    public function updatedFilter()
    {
        Log::info("📌 Filter changed to: " . $this->filter);
        $this->loadData();
    }

    public function loadData()
{
    $query = Product::selectRaw('name, SUM(sold) as total_sold')
        ->groupBy('name');

    // Jika bukan admin, filter berdasarkan shopId
    if (!auth()->user()->isAdmin()) {
        if (!$this->shopId) {
            return; // Jika tidak ada shopId, tidak perlu query
        }
        $query->where('shop_id', $this->shopId);
    }

    // Filter berdasarkan tanggal
    if ($this->filter === 'daily') {
        $query->whereDate('created_at', now()->toDateString());
    } elseif ($this->filter === 'monthly') {
        $query->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year);
    } elseif ($this->filter === 'yearly') {
        $query->whereYear('created_at', now()->year);
    }

    $products = $query->orderByDesc('total_sold')->get();

    // Perbarui data
    $this->productNames = $products->pluck('name')->toArray();
    $this->salesData = $products->pluck('total_sold')->toArray();

    // Kirim event ke JavaScript
    $this->dispatch('updateChart', productNames: $this->productNames, salesData: $this->salesData);
}


    public function render()
    {
        return view('livewire.sales-chart', [
            'productNames' => $this->productNames,
            'salesData' => $this->salesData,
        ]);
    }
}