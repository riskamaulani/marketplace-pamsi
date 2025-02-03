<?php

namespace App\Livewire\CartResources;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartDelete extends Component
{
    #[On('cart-delete')]
    public function deleteCart($productId)
    {
        Cart::where('user_id', Auth::user()->id)->where('product_id', $productId)->delete();
        return redirect()->to(route('cart'));
    }

    public function render()
    {
        return "<div?></div>";
    }
}
