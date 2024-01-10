<?php

namespace App\Http\Controllers;

use App\Enums\UserStatus;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        return match (Auth::user()->status) {
            UserStatus::ADMIN => $this->transaksiAdmin(),
            UserStatus::PEMBELI => $this->transaksiPembeli(),
            UserStatus::PENJUAL => $this->transaksiPenjual()
        };
    }
    public function checkout(Transaksi $transaksi)
    {
        return view('pages.buyer.checkout');
    }
    private function transaksiAdmin()
    {
        return view('pages.admin.transactions', [
            'transaksi' => []
        ]);
    }

    private function transaksiPembeli()
    {
        return view('pages.buyer.transactions');
    }

    private function transaksiPenjual()
    {
        return view('pages.seller.transactions');
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
    public function show(Transaksi $transaksi)
    {
        return view('pages.buyer.invoice');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
