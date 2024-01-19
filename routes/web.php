<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KategoriController;

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
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');


    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');

    // Admmin
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/katalog', [ProdukController::class, 'catalog'])->name('catalog');

    // Seller
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');


    // Buyer
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::get('/invoice', [TransaksiController::class, 'show'])->name('invoice');
    Route::get('/toko', [TokoController::class, 'index'])->name('store');

    //coba-coba
    Route::get('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');

    Route::get('/pencarian', [ProdukController::class, 'search'])->name('cari');
});
