<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Models\Transaction;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'home'])->name('home');
    

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/order', [OrderController::class, 'buyer'])->name('order');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');


    // Buyer
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.detail'); // product detail
    Route::get('/shop/{shop}', [ShopController::class, 'show'])->name('shop.show'); // product detail
    
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout'); // product checkout


    Route::prefix('admin')->middleware('role:admin,penjual')->group(function () {
        
        // Seller
        Route::middleware('role:penjual')->group(function () {
            Route::middleware('check.shop.verify')->group(function () {
                Route::get('/product', [ProductController::class, 'index'])->name('product.index'); // product
                Route::get('/order', [OrderController::class, 'index'])->name('order.index'); // order
                Route::get('/rating', [OrderController::class, 'rating'])->name('rating.index'); // rating
            });
            Route::get('/shop/profile', [ShopController::class, 'edit'])->name('shop.edit'); // shop profile
            Route::patch('/shop/{shop}', [ShopController::class, 'update'])->name('shop.update'); // shop update
            Route::get('/shop/dashboard', [DashboardController::class, 'index'])->name('dashboard.shop');

        });


        // Admin
        Route::middleware('role:admin')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index'); // user
            Route::get('/user', [UserController::class, 'index'])->name('user.index'); // user
            Route::get('/shop', [ShopController::class, 'index'])->name('shop.index'); // shop
            Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction.index'); // transaction
            Route::get('/categories', [CategoryController::class, 'index'])->name('category.index'); // category
        });

    });
});

require __DIR__.'/auth.php';
