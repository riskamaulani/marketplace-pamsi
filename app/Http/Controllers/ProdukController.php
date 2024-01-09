<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Requests\ProductStoreRequest;

class ProdukController extends Controller
{
    public function index()
    {
        return view('pages.seller.products');
    }

    public function store(ProductStoreRequest $request)
    {
        dd($request);
    }

    public function show(Produk $produk)
    {
        //
    }

    public function update(Request $request, Produk $produk)
    {
        //
    }

    public function destroy(Produk $produk)
    {
        //
    }
}
