<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = auth()->user()->produks;
        $categories = Kategori::orderBy('nama')->get();
        return view('pages.seller.products', compact('categories', 'produks'));
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            // save image first
            $gambar = $request->file('gambar')->store('images-produk');

            // store data
            Produk::create([
                'nama' => $request->nama,
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'gambar' => $gambar,
                'status' => $request->status,
                'toko_id' => auth()->user()->toko->id,
                'kategori_id' => $request->kategori_id,
                'order_type' => $request->order_type
            ]);
        } catch (\Throwable $th) {
            notify()->error('Penambahan produk gagal. ' . $th->getMessage(), 'Gagal!');
            return back();
        }

        notify()->success('Penambahan produk berhasil.', 'Berhasil!');
        return redirect(route('produk'));
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);

        return view('pages.buyer.detail_product', compact('produk'));
    }

    public function update(ProductUpdateRequest $request, Produk $produk)
    {
        try {
            // update image if user want to update
            if ($request->file('gambar')) {
                if ($produk->gambar) {
                    Storage::delete($produk->gambar);
                }
                $produk->gambar = $request->file('gambar')->store('images-produk');
            }

            // update data for produk model
            $produk->nama = $request->nama;
            $produk->harga = $request->harga;
            $produk->status = $request->status;
            $produk->kategori_id = $request->kategori_id;
            $produk->order_type = $request->order_type;

            // save to database
            $produk->save();
        } catch (\Throwable $th) {
            notify()->error('Update produk gagal. ' . $th->getMessage(), 'Gagal!');
            return back();
        }

        notify()->success('Update produk berhasil.', 'Berhasil!');
        return redirect(route('produk'));
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
