<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class OrderObserver
{
    public function updated(Order $order)
    {
        if ($order->isDirty('status') && $order->status == 'done') {
            $products = json_decode($order->products);

            DB::transaction(function () use ($products) {
                foreach ($products as $item) {
                    $product = Product::lockForUpdate()->find($item->id);

                    // Update the product's rating
                    $product->increment('sold', $item->quantity);
                }
            });
        }
    }
}
