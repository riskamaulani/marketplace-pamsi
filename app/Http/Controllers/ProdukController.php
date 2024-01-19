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
    public function create()
    {
        return view('pages.seller.products');
    }
    public function store(ProductStoreRequest $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'status' => 'required',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.create')
            ->with('success', 'Product created successfully.');
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
    public function search(Produk $produk)
    {
        return view('pages.buyer.search-feature');
    }
    public function catalog(Produk $produk)
    {
        return view('pages.admin.catalog-product');
    }
}
