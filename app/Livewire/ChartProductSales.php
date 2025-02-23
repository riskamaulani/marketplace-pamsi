<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ChartProductSales extends Component
{
    public $chartProductData = [];
    public $filter = 'daily'; // Default filter harian
    public $shopId;
    public $isAdmin;

    public function mount()
    {
        $this->loadChartData();
    }

    public function updatedFilter()
    {
        $this->loadChartData();
    }

    public function loadChartData()
    {
        $orders = Order::where('status', 'done');

        if ($this->filter === 'daily') {
            $orders = $orders
                ->selectRaw('DATE(created_at) as date, SUM(products_quantity) as total_products')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            $categories = $orders->pluck('date')->map(fn($date) => date('d M', strtotime($date)))->toArray();
            $data = $orders->pluck('total_products')->toArray();
        } elseif ($this->filter === 'monthly') {
            $orders = $orders
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(products_quantity) as total_products')
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();

            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
            $categories = $orders->map(fn($order) => $months[$order->month - 1] . " " . $order->year)->toArray();
            $data = $orders->pluck('total_products')->toArray();
        } elseif ($this->filter === 'yearly') {
            $orders = $orders
                ->selectRaw('YEAR(created_at) as year, SUM(products_quantity) as total_products')
                ->groupBy('year')
                ->orderBy('year')
                ->get();

            $categories = $orders->pluck('year')->toArray();
            $data = $orders->pluck('total_products')->toArray();
        }

        $this->chartProductData = [
            'series' => [[
                'name' => 'Sales',
                'data' => $data
            ]],
            'categories' => $categories
        ];
        

        $this->dispatch('chartUpdated', chartProductData: $this->chartProductData);
    }

    public function render()
    {
        return view('livewire.chart-product-sales', [
            'chartProductData' => $this->chartProductData ?? ['series' => [], 'categories' => []]
        ]);
    }
}
