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
                'totalSales' => Order::whereHas('transaction', function ($query) {
                    $query->where('status', 'accept');
                })->sum('products_quantity'), // Total produk terjual dengan status transaksi "accept"

                'totalRevenue' => Order::whereHas('transaction', function ($query) {
                    $query->where('status', 'accept');
                })->sum('total_product'), // Total pendapatan hanya dari transaksi yang diterima

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
                ->whereHas('transaction', function ($query) {
                    $query->where('status', 'accept');
                })
                ->sum('products_quantity'), // Total produk terjual di toko (hanya yang statusnya accept)

            'totalRevenue' => Order::where('shop_id', $shopId)
                ->whereHas('transaction', function ($query) {
                    $query->where('status', 'accept');
                })
                ->sum('total_product'), // Total pendapatan toko (hanya dari transaksi yang diterima)

            'totalBuyers' => Transaction::whereHas('orders', function ($query) use ($shopId) {
                $query->where('shop_id', $shopId);
            })->distinct('user_id')->count('user_id'), // Total pembeli unik untuk toko ini



        ]);
    }

    public function home()
    {
        return view('pages.home', [
            'categories' => Category::select('id', 'name')->orderBy('name')->get()
        ]);
    }
}
