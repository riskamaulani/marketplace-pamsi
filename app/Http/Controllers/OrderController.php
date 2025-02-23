<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        return view('pages.admin.order.index');
    }

    public function buyer()
    {
        $orders = Auth::user()->order()->with(['shop' => function ($query) {
            $query->select('id', 'name');
        }])->get();

        foreach ($orders as $order) {
            $order->products = json_decode($order->products);
        }

        return view('pages.order', [
            'orders' => $orders
        ]);
    }

    public function show(Order $order)
    {
        $order->shipping_text = match($order->shipping) {
            'courier-in-mataram' => 'Kurir (Daerah Mataram)',
            'courier-out-mataram' => 'Kurir (Luar Mataram)',
            default => 'Ambil Sendiri',
        };

        return view('pages.invoice', [
            'order' => $order,
            'products' => json_decode($order->products)
        ]);
        
    }

    public function rating()
    {
        $ratings = DB::table('orders')
        ->leftJoin('ratings', 'orders.id', '=', 'ratings.order_id')
        ->leftJoin('users', 'ratings.user_id', '=', 'users.id')
        ->leftJoin('products', 'ratings.product_id', '=', 'products.id')
        ->where('orders.shop_id', session('shop_id'))
        ->where('orders.rating', true)
        ->select('ratings.*', 'users.name as user_name', 'users.profile as user_profile', 'products.name as product_name')
        ->orderBy('ratings.created_at')->get();

        // dd($ratings);

        return view('pages.admin.rating.index', [
            'ratings' => $ratings
        ]);
    }
}
