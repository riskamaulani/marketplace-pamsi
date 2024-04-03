<?php

namespace App\Http\Controllers;

use App\Enums\TokoStatus;
use App\Models\Produk;
use App\Models\Toko;
use App\Models\User;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.buyer.store');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    
    public function show($id)
    {
       
        $data['toko']=Toko::where('tokos.id',$id)
        ->leftJoin('produks', 'produks.toko_id', '=', 'tokos.id')
        ->select('tokos.*','produks.id as produk_id', 'produks.nama as nama_produk', 'produks.harga as harga_produk','produks.gambar as gambar_produk')
        ->first();
        return view('pages.buyer.store',$data);

        // 'tokos.nama as toko','tokos.id as tokos_id','tokos.foto as gambar_toko','tokos.status as status_toko',
        // 'produks.id as produk_id', 'produks.nama as nama_produk', 'produks.harga as harga_produk'
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Toko $toko)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Toko $toko)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Toko $toko)
    {
        //
    }
}
