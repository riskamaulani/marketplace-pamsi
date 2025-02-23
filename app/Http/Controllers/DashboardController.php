<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return view('pages.admin.dashboard.index', [
                'totalSales' => Order::where('status', 'done')->sum('products_quantity'), // Total produk terjual hanya dari order "done"
        
                'totalRevenue' => Order::where('status', 'done')->sum('total_product'), // Total pendapatan hanya dari order "done"
        
                'totalStores' => Shop::count(), // Banyak toko
                'totalUsers' => User::count(), // Banyak pengguna
            ]);
        }
        
        if (!$user->shop->verify) {
            return redirect()->route('shop.edit');
        }

        $shopId = $user->shop->id;

        return view('pages.dashboard', [
            'totalSales' => Order::where('shop_id', $shopId)
            ->where('status', 'done')
            ->sum('products_quantity'), // Total produk terjual hanya dari order "done" di toko ini

        'totalRevenue' => Order::where('shop_id', $shopId)
            ->where('status', 'done')
            ->sum('total_product'), // Total pendapatan hanya dari order "done" di toko ini
            'totalBuyers' => Transaction::whereHas('orders', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId);
            })->distinct('user_id')->count('user_id'), // Total pembeli unik untuk toko ini



        ]);
    }

    public function home()
    {
        $categories = Category::all();
        return view('pages.home', compact('categories'));

        
    }
}
