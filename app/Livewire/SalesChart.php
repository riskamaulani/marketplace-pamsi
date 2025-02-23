<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SalesChart extends Component
{
    public $filter = 'monthly'; // Default: Harian
    public $productNames = [];
    public $salesData = [];

    public function mount()
    {
        $this->loadData();
    }

    public function updatedFilter()
    {
        $this->loadData();
    }

    public function loadData()
{
    $products = Product::select('name', 'sold')->orderBy('sold', 'desc')->get();

    $this->productNames = $products->pluck('name')->toArray();
    $this->salesData = $products->pluck('sold')->toArray();

    $this->dispatch('updateChart', $this->productNames, $this->salesData);
}


    public function render()
    {
        return view('livewire.sales-chart');
    }
}
