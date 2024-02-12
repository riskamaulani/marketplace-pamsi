<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        $kategori = Kategori::all();
        return view('pages.buyer.homepage', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function list()
    {
        $kategori = Kategori::all();
        return view('pages.admin.data-category', compact('kategori'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(AddCategoryRequest $request)
    {
        try {

            // tambah penjual
            $kategori = Kategori::create([
                'nama' => $request->nama,
                

            ]);

            //tambah ke toko
            
        } catch (\Throwable $th) {
            notify()->error('Penambahan kategori gagal. ' . $th->getMessage(), 'Gagal!');
            return back();
        }

        notify()->success('Penambahan kategori berhasil.', 'Berhasil!');


        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
