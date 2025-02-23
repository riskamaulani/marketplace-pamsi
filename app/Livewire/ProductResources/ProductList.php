<?php

namespace App\Livewire\ProductResources;

use App\Models\Product;
use Livewire\Component;

class ProductList extends Component
{
    public $products = [];
    
    public function mount()
    {
        $categoryId = request('category');
        $this->products = $categoryId ? Product::where('category_id', $categoryId)->get() : Product::all();
    }

    public function render()
    {
        return view('livewire.product-list', ['products' => $this->products]);
    }
}
