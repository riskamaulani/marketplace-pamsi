<?php

namespace App\Livewire\ProductResources;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class AddToCart extends Component
{
    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    #[On('add-to-cart')]
    public function addToCart($total)
    {
        Cart::updateOrInsert(
            ['user_id' => Auth::user()->id, 'product_id' => $this->product->id,],
            ['total' => $total]
        );

        $this->alert(
            'success',
            'Produk berhasil ditambahkan.',
            );

        $this->dispatch('reset-total'); // reset add to cart total
    }

    public function render()
    {
        return view('livewire.product-resources.add-to-cart');
    }
}
