<?php

use App\Http\Controllers\AdmDashController;
use App\Http\Controllers\AdmTransController;
use App\Http\Controllers\AdmSellerController;
use App\Http\Controllers\AdmUserController;
use App\Http\Controllers\DetailCategoryController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\SellerDashController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

/*
|--------------------------------------------------------------------------
| Web Routes for User Costumers
|--------------------------------------------------------------------------
*/

Route::get('/homepage', [HomeController::class, 'index']);
// Route::get('/detail-category/{id}', [HomeController::class, 'detail_kategori']);
Route::get('/detail-category/{id}', [DetailCategoryController::class, 'detail_kategori']);
Route::get('/detail-product/{id}', [DetailProdukController::class, 'detail_produk'])->name('detailproduk');

//admin
Route::get('/dashboard', [AdmDashController::class, 'index']);
Route::get('/data-transactions', [AdmTransController::class, 'transaksi']);
Route::get('/data-sellers', [AdmSellerController::class, 'penjual']);
Route::get('/data-users', [AdmUserController::class, 'pembeli']);

//seller
Route::get('/seller-dashboard/{id}', [SellerDashController::class, 'index']);

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'index')->name('loginpage')->middleware('guest');
    Route::get('/register', 'create')->name('registerpage')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/register', 'store')->name('register');
    Route::post('/logout', 'logout')->name('logout');
});

// Route::get('/register', function () {
//     return view('register');
// });
// Route::get('/login', function () {
//     return view('login');
// });

Route::get('/checkout', function () {
    return view('UserBuyer/checkout');
});
Route::get('/transaction', function () {
    return view('UserBuyer/history-transaction');
});
Route::get('/cart', function () {
    return view('UserBuyer/cart');
});
Route::get('/user-profile', function () {
    return view('UserBuyer/user-profile');
});

/*
|--------------------------------------------------------------------------
| Web Routes for Admin
|--------------------------------------------------------------------------
*/


Route::get('/layout_admin', function () {
    return view('Admin/layout_admin');
});
Route::get('/profil-admin', function () {
    return view('Admin/profil-admin');
});



/*
|--------------------------------------------------------------------------
| Web Routes for Sellers
|--------------------------------------------------------------------------
*/


Route::get('/seller-data-products', function () {
    return view('UserSeller/seller-data-products');
});
Route::get('/seller-profile', function () {
    return view('UserSeller/seller-profile');
});
Route::get('/seller-data-transactions', function () {
    return view('UserSeller/seller-data-transactions');
});
Route::get('/seller-data-reviews', function () {
    return view('UserSeller/seller-data-reviews');
});
