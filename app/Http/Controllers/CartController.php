<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {

        $carts = DB::table('carts')
        ->leftJoin('products', 'carts.product_id', '=', 'products.id')
        ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')
        ->select('products.*', 'shops.name as shop_name', 'carts.total as total')
        ->orderBy('products.shop_id')
        ->get()
        ->groupBy('shop_id')
        ->map(function ($group) {
            $shopName = $group->first()->shop_name;
            return [
                'shop_name' => $shopName,
                'products' => $group,
            ];
        });

        return view('pages.cart', [
            'carts' => $carts
        ]);
    }

    public function checkout()
    {
        $data = json_decode(base64_decode(request()->state));

        // check if data exist
        if($data == null) {
            return redirect()->route('cart');
        }

        $productIds = [];
        $productsWithTotal = [];
        foreach ($data as $product) {
            $productIds[] = $product->product_id;
            $productsWithTotal[$product->product_id] = $product->total;
        }

        $totalPrices = [];

        // Get product details
        $products = Product::whereIn('products.id', $productIds)
        ->leftJoin('shops', 'products.shop_id', '=', 'shops.id')
        ->orderBy('products.shop_id')
        ->get(['products.id', 'products.name', 'products.price', 'products.image', 'products.shop_id', 'shops.name as shop_name'])
        ->groupBy('shop_id')
        ->map(function ($group) use ($productsWithTotal, &$totalPrices) {
            $shopName = $group->first()->shop_name;
            $shopId = $group->first()->shop_id;
            $totalShopPrice = 0;

            $products = $group->map(function ($product) use ($productsWithTotal, &$totalPrices, &$totalShopPrice) {
                $quantity = $productsWithTotal[$product->id] ?? 1;
                $totalPrice = $product->price * $quantity;
                $totalShopPrice += $totalPrice;
                $totalPrices[$product->id] = $totalPrice;

                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->image,
                    'quantity' => $productsWithTotal[$product->id] ?? 1,
                ];
            });

            return [
                'shop_name' => $shopName,
                'shop_id' => $shopId,
                'products' => $products,
                'total_shop_price' => $totalShopPrice,
                'note' => '',
                'shipping' => 'take-self',
            ];
        });

        // Calculate the overall total price
        $overallTotalPrice = array_sum($totalPrices);

        return view('pages.checkout', [
            'shops' => $products,
            'productTotal' => array_sum($productsWithTotal),
            'overallTotalPrice' => $overallTotalPrice
        ]);
    }
}
