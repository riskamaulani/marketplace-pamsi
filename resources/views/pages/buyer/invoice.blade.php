@extends('layouts.auth-layout', [
'title' => 'Invoice',
])

@section('content')
<main>
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-12">
                <div class="card invoice px-3 py-3">

                    <img src="assets/img/logo-pamsi-marketplace-green.png" alt="" style="width:6rem;height:auto;">
                    <h1 class="card-title fs-1 ">Invoice</h1>
                    <div class="row mb-2">

                        <h5 style="font-weight:bold">PO12345678</h5>

                    </div>
                    <div class="row">
                        <h5 style="font-weight:bold">Kedai Minuman Segar</h5>
                    </div>
                    <hr class="line-divider">
                    <div class="row ">
                        <div class="col-6">
                            <h6>Nama Produk</h6>
                        </div>
                        <div class="col-3">
                            <h6 class="text-center">Jumlah Produkk</h6>
                        </div>
                        <div class="col-3">
                            <h6 class="text-center">Jumlah</h6>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-6">
                            <h6 style="font-weight:bold">Es Mentimun</h6>
                        </div>
                        <div class="col-3 ">
                            <h6 style="font-weight:bold" class="text-center">2</h6>
                        </div>
                        <div class="col-3">
                            <h6 style="font-weight:bold" class="text-center">20.000</h6>
                        </div>
                    </div>
                    <hr class="line-divider">


                    <div class="row">

                        <div class="col-9">
                            <h6>Ongkos Kirim</h6>
                        </div>
                        <div class="col-3">
                            <h6 class="text-center" style="font-weight:bold">-</h6>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-9">
                            <h6>Total</h6>
                        </div>
                        <div class="col-3">
                            <h6 class="text-center" style="font-weight:bold">20.000</h6>
                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-3">
                            <h6>Catatan </h6>
                        </div>
                        <div class="col-9">
                            <p style="font-weight:bold">: Es Terpisah</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h6>Jenis Pengiriman </h6>
                        </div>
                        <div class="col-9">
                            <p style="font-weight:bold">: Ambil Sendiri</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-3">
                            <h6>Alamat Pengiriman </h6>
                        </div>
                        <div class="col-9">
                            <p style="font-weight:bold">: -</p>
                        </div>

                    </div>

                    <!-- id transaksi
                    nama toko 
                    produk  
                    catatan produk
                    jumlah produk 
                    alamat pengiriman 
                    jenis pengiriman 
                    subttotal
                    ongkos kirim
                    total       -->

                </div>
            </div>
        </div>

    </div>
</main>
@endsection