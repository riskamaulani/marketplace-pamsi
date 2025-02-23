<?php

namespace App\Livewire;


use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChartRevenue extends Component
{

    public $chartRevenueData = [];
    public $filter = 'daily'; // Default filter harian
    public $shopId;
    public $isAdmin;

    public function mount()
    {
        $user = Auth::user();
        $this->isAdmin = $user->role === 'admin';

        // Jika bukan admin, ambil shop_id dari user
        if (!$this->isAdmin) {
            $this->shopId = $user->shop->id;
        }

        $this->loadChartData();
    }

    public function updatedFilter()
    {
        $this->loadChartData();
    }
    public function loadChartData()
    {
        $orders = collect(); // Inisialisasi collection kosong
        $categories = [];
        $data = [];

        $query = Order::where('status', 'done');

        // Jika bukan admin, hanya ambil data berdasarkan toko user
        if (!$this->isAdmin) {
            $query->where('shop_id', $this->shopId);
        }

        if ($this->filter === 'daily') {
            $orders = $query
                ->selectRaw('DATE(created_at) as date, SUM(total_product) as total_sales')
                ->groupBy('date')
                ->orderBy('date')
                ->get();

            foreach ($orders as $order) {
                $categories[] = date('d M', strtotime($order->date));
                $data[] = $order->total_sales;
            }
        } elseif ($this->filter === 'monthly') {
            $orders = $query
                ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total_product) as total_sales')
                ->groupBy('year', 'month')
                ->orderBy('year')
                ->orderBy('month')
                ->get();

            $months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];

            foreach ($orders as $order) {
                if ($order->month) {
                    $categories[] = $months[$order->month - 1] . " " . $order->year;
                    $data[] = $order->total_sales;
                }
            }
        } elseif ($this->filter === 'yearly') {
            $orders = $query
                ->selectRaw('YEAR(created_at) as year, SUM(total_product) as total_sales')
                ->groupBy('year')
                ->orderBy('year')
                ->get();

            foreach ($orders as $order) {
                $categories[] = $order->year;
                $data[] = $order->total_sales;
            }
        }

        $this->chartRevenueData = [
            'series' => [[
                'name' => 'Sales (Done Orders)',
                'data' => $data
            ]],
            'categories' => $categories
        ];

        $this->dispatch('chartUpdated', chartData: $this->chartRevenueData, type: 'revenue');
    }

    public function render()
    {
        return view('livewire.chart-revenue', [
            'chartRevenueData' => $this->chartRevenueData ?? ['series' => [], 'categories' => []]
        ]);
    }
}
