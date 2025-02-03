<?php

namespace App\Livewire\ProductResources;

use App\Models\Order;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductRating extends Component
{
    public $modalName = '';

    public Order $order;
    public $data = [], $error = false;

    #[On('set-rating-data')]
    public function setData(Order $order, $data)
    {
        $this->order = $order;
        $this->data = $data;
    }

    public function submitRatings()
    {
        $ratings = [];

        // save rating
        foreach($this->data as $product) {
            if(!isset($product['rating'])) {
                $this->error = true;
                return;
            }

            $ratings[] = [
                'user_id' => Auth::user()->id,
                'product_id' => $product['id'],
                'rating' => $product['rating'],
                'comment' => $product['comment'] ?? null
            ];
        }

        $this->order->rating()->createMany($ratings);

        $products = $this->data;

        // update rating in product table
        DB::transaction(function () use ($products) {
            foreach ($products as $item) {
                $product = Product::lockForUpdate()->find($item['id']);

                // Update the product's rating
                $this->updateProductRating($product, $item['rating']);
            }
        });


        // make label order has rating
        $this->order->rating = true;
        $this->order->save();

        return redirect()->to(route('order'));
    }

    protected function updateProductRating($product, $newRating)
    {
        $ratingCount = $product->ratings_count;

        // Calculate new average rating using the provided formula
        $newRating = ($ratingCount * $product->ratings + $newRating) / ($ratingCount + 1);

        // Update the product's rating details
        $product->ratings_count += 1;
        $product->ratings = round($newRating, 1);
        $product->save();
    }

    #[On('reset-modal')]
    public function resetInput()
    {
        $this->resetExcept(['modalName']);
    }

    public function render()
    {
        return view('livewire.product-resources.product-rating');
    }
}
