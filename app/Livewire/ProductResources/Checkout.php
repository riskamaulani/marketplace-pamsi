<?php

namespace App\Livewire\ProductResources;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Checkout extends Component
{
    use WithFileUploads;

    public $image;

    public $shops, $overallTotalPrice, $productTotal, $payment = 'cod', $address;

    public $shippingPrices = [
        'take-self' => 0,
        'courier-in-mataram' => 10000,
        'courier-out-mataram' => 0,
    ];

    public function mount($shops = null, $overallTotalPrice = 0, $productTotal = 0)
    {
        $this->shops = $shops;
        $this->overallTotalPrice = $overallTotalPrice;
        $this->productTotal = $productTotal;
        $this->address = Auth::user()->address;
    }

    public function calculateTotal()
    {
        $totalShipping = 0;
        foreach ($this->shops as $shop) {
            $shipping = $shop['shipping'];
            $price = $this->shippingPrices[$shipping] ?? 0;
            $totalShipping += $price;
        }

        return $this->overallTotalPrice + $totalShipping;
    }

    public function checkout()
    {
        $imageUrl = null;
        if($this->payment !== 'cod') {
            $imageUrl = $this->image->store('transactions', 'public');
        }

        // create transaction
        $transaction = Transaction::create([
            'bill' => $imageUrl,
            'total' => $this->calculateTotal(),
            'address' => $this->address,
            'payment' => $this->payment,
            'user_id' => Auth::user()->id,
        ]);

        $product_ids = [];

        // create orders and insert the transaction id
        foreach($this->shops as $shop) {
            $product_quantity = 0;

            foreach($shop['products'] as $product) {
                $product_ids[] = $product['id'];
                $product_quantity += $product['quantity'];
            }

            Order::create([
                'total' => $shop['total_shop_price'] + $this->shippingPrices[$shop['shipping']],
                'total_product' => $shop['total_shop_price'],
                'note' => $shop['note'],
                'shipping' => $shop['shipping'],
                'shipping_fee' => $this->shippingPrices[$shop['shipping']],
                'products_quantity' => $product_quantity,
                'products' => json_encode($shop['products']),
                'shop_id' => $shop['shop_id'],
                'transaction_id' => $transaction->id,
            ]);
        }

        // delete product from cart
        Cart::where('user_id', Auth::user()->id)->whereIn('product_id', $product_ids)->delete();

        $this->redirectRoute('order');
    }

    public function render()
    {
        return view('livewire.product-resources.checkout');
    }
}
