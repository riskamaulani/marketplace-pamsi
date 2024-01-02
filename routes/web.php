<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\DetailCategoryController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

// route for login register
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('loginpage')->middleware('guest');
    Route::get('/register', 'create')->name('registerpage')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/register', 'store')->name('register');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

// home page all user
Route::group(['middleware' => 'auth'], function () {
    Route::post('/password', [AuthController::class, 'changePassword'])->name('change_password');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');

    // Admmin
    Route::get('/user', [UserController::class, 'index'])->name('user');

    // Seller
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

    // Buyer
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
});

// Route::get('/homepage', [HomeController::class, 'index']);
// Route::get('/detail-category/{id}', [HomeController::class, 'detail_kategori']);
// Route::get('/detail-category/{id}', [DetailCategoryController::class, 'detail_kategori']);
// Route::get('/detail-product/{id}', [DetailProdukController::class, 'detail_produk'])->name('detailproduk');

//seller

// Route::get('/checkout', function () {
//     return view('UserBuyer/checkout');
// });
// Route::get('/transaction', function () {
//     return view('UserBuyer/history-transaction');
// });

// Route::get('/user-profile', function () {
//     return view('UserBuyer/user-profile');
// });
