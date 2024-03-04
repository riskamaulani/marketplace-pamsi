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
use App\Models\Kategori;

// route for login register
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'index')->name('loginpage')->middleware('guest');
    Route::get('/register', 'create')->name('registerpage')->middleware('guest');
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/register', 'store')->name('register');
    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
});

// all user
Route::group(['middleware' => 'auth'], function () {
    Route::post('/password', [AuthController::class, 'changePassword'])->name('change_password');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');


    Route::get('/profil', [UserController::class, 'profil'])->name('profil');
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/ulasan', [ProdukController::class, 'ulasan'])->name('ulasan');

    // Admmin
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::post('/seller', [UserController::class, 'add'])->name('seller.add');
    Route::get('/data-kategori', [KategoriController::class, 'list'])->name('category.list');
    Route::post('/tambah-kategori', [KategoriController::class, 'add'])->name('category.add');
    Route::get('/detail-penjual', [UserController::class, 'detailSeller'])->name('seller.detail');
    Route::get('/katalog', [ProdukController::class, 'catalog'])->name('catalog');
    Route::get('/detail-katalog', [ProdukController::class, 'detailCatalog'])->name('seller.produk.detail');

    // Seller
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');

    Route::post('/profil-toko/{toko}', [UserController::class, 'profilToko'])->name('profil.toko');


    // Buyer
    Route::get('/detail_product/{id}', [ProdukController::class, 'show'])->name('produk.detail');
    Route::post('/proses_pesanan', [ProdukController::class, 'proses_pesanan'])->name('produk.proses');
    Route::post('/simpanTrans', [ProdukController::class, 'simpanTrans'])->name('produk.simpanTrans');
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
    Route::get('/invoice', [TransaksiController::class, 'show'])->name('invoice');
    Route::get('/toko', [TokoController::class, 'index'])->name('store');
    Route::post('/profil-user/{user}', [UserController::class, 'profilUser'])->name('profil.user');


    //coba-coba
    Route::get('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');

    Route::get('/pencarian', [ProdukController::class, 'search'])->name('cari');
});
