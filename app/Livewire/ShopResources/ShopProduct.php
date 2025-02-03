<?php

namespace App\Livewire\ShopResources;

use App\Models\Product;
use Livewire\Component;

class ShopProduct extends Component
{
    public function render()
    {
        $products = Product::where('shop_id', session('shop_id'))->latest()->get();

        return view('livewire.shop-resources.shop-product', [
            'products' => $products
        ]);
    }
}
