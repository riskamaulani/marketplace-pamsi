@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main data-sellers">

    <div class="pagetitle">
        <h1>Kedai Minuman Segar</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Penjual</li>
                <li class="breadcrumb-item active">Kedai Minuman Segar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section data-users">
        <div class="row">
            <div class="col-lg-4">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col px-1 py-1  d-flex flex-columns">
                                <img src="../assets/img/no-image.jpg" alt="..." class="rounded " style=" width: 100%; height:auto">
                            </div>
                            <div class="badge bg-success">Buka</div>
                        </div>


                    </div>

                </div>
               
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                            
                                <div class="row my-3">
                                    <div class="col-sm-4">Nama Toko</div>
                                    <div class="col-sm-8" >
                                        Kedai Minuman Segar
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">Tentang</div>
                                    <div class="col-sm-8">
                                        Toko Ini Menjual Minuman Segar. Tersedia beberapa varian minuman

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">Pengelola</div>
                                    <div class="col-sm-8">
                                        Maesaroh
                                     </div>
                                </div>

                                <div class="row mb-3">
                                    <div class= "col-sm-4 ">
                                        Jadwal Buka
                                    </div>
                                    <div class="col-sm-8">
                                        Senin | Rabu | Jumat
                                    </div>
                                    
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">No. Telepon</div>
                                    <div class="col-sm-8">
                                        0812345678
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">Email</div>
                                    <div class="col-sm-8">
                                        penjual@gmail.com
                                    </div>
                                </div>

                                <hr class="line-divider">

                                <div class="row mb-3">
                                    <div class="col-sm-4">Jumlah Pembeli</div>
                                    <div class="col-sm-8" style="font-weight: bold;">
                                        15
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">Jumlah Produk Terjual</div>
                                    <div class="col-sm-8" style="font-weight: bold;">
                                        30
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-4">Total Pendapatan</div>
                                    <div class="col-sm-8" style="font-weight: bold;">
                                        300.000
                                    </div>
                                </div>
                                <hr class="line-divider">



                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label">Status</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example"> 
                                            <option value="1" selected>Buka</option>
                                            <option value="2">Tutup</option>
                                        </select>
                                    </div>
                                </div>
 
                            </div>
                        </div>
                    </div>
                    <div class="submit-order mb-3 px-3 d-grid gap-1 d-md-flex justify-content-md-end">
                        <button class="btn btn-danger " type="button" data-bs-toggle="modal" data-bs-target="#buttonDeleteSeller">Hapus Penjual</button>
                        <!-- <button class="btn btn-primary" type="submit">Simpan</button> -->
                        <a href="{{ route('checkout') }}" class="btn btn-primary" style="color:white;" type="button">Simpan Perubahan</a>

                        <div class="modal fade" id="buttonDeleteSeller" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Hapus Penjual</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin untuk menghapus penjual?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>

        </div>

        

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title">Produk dari toko ini</h5>
                                <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">

                                <div class="col">
                                
                                    <div class="card">
                                        <a href="{{ route('seller.produk.detail') }}" >
                                            <img src="assets/img/es mentimun.jpg" class="card-img-top" alt="Gambar pancake">
                                            <div class="card-body-product">

                                                <h6 class="card-title-product">
                                                    Es Mentimun
                                                </h6>
                                                <p class="card-text">Rp 10.000</p>
                                            </div>
                                        </a>
                                    </div>                               
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>
</main><!-- End #main -->
@endsection