<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Transaksi;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\TransaksiStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = auth()->user()->produks;
        $categories = Kategori::orderBy('nama')->get();
        return view('pages.seller.products', compact('categories', 'produks'));
    }

    public function ulasan()
    {
        return match (Auth::user()->status) {
            
            UserStatus::PENJUAL => $this->ulasanPenjual()
        };
    }
    private function ulasanPenjual()
    {
        return view('pages.seller.review', [
            'toko' => auth()->user()->toko
        ]);
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
       
        $data['data']=Produk::where('produks.id',$id)
        ->leftJoin('tokos', 'tokos.id', '=', 'produks.toko_id')
        ->leftJoin('kategoris', 'kategoris.id', '=', 'produks.kategori_id')
        ->select('produks.*','tokos.nama as nama_toko','kategoris.nama as nama_kat')
        ->first();
        return view('pages.buyer.detail_product',$data);
    }

    public function proses_pesanan(Request $request)
    {
        $data['count']=$request->count;
        $data['produk']=Produk::where('id',$request->produk_id)->first();
        $data['total']=$data['produk']->harga*$data['count'];
        if($request->action=='keranjang')
        {
            Keranjang::create([
                'user_id'=>$request->user_id,
                'produk_id' => $request->produk_id,
                'jumlah' => $request->count
    
            ]);
            notify()->success('Penambahan ke Keranjang berhasil.', 'Berhasil!');
            return redirect('/');
        }
        else {
           
            return view('pages.buyer.checkout',$data);
        }
    }

    public function simpanTrans(Request $request)
    {
        Transaksi::create([
            'transaksi_id'=>'TRX'.date('YmdHis'),
            'produk_id' => $request->produk_id,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'status' =>0,
            'bukti' => 'bukti',

        ]);
        // try {
        //     // save image first
        //     // $gambar = $request->file('bukti')->store('images-produk');

        //     // store data
           
        // } catch (\Throwable $th) {
        //     notify()->error('Penambahan transaksi gagal. ' . $th->getMessage(), 'Gagal!');
        //     return back();
        // }

        notify()->success('Penambahan transaksi berhasil.', 'Berhasil!');
        return redirect('/');
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
    
    public function detailCatalog(Produk $produk)
    {
        return view('pages.admin.detail-catalog-product');
    }
}
