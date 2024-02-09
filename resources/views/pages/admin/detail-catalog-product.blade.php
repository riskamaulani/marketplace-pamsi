@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main data-users">

    <div class="pagetitle">
        <h1>Es Mentimun</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Kedai Minuman Segar</li>
                <li class="breadcrumb-item active">Es Mentimun</li>
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
                                <img src="../assets/img/es mentimun.jpg" alt="..." class="rounded " style=" width: 100%; height:auto">
                            </div>
                        </div>


                    </div>

                </div>
                <div class="card detail-product-buyer overflow-auto ">
                    <div class="row  py-2 mx-auto">
                        <div class="col-4  d-flex flex-column my-auto mx-auto">
                            <img src="../assets/img/es mentimun.jpg" alt="" class="rounded-circle img-fluid mb-1" style="width: 100%; height:auto">
                            <span class="badge bg-success">Buka</span>
                        </div>
                        <div class="col-8 ">
                            <a href="{{ route('seller.detail') }}">
                                <h6 class="card-title ">Kedai Minuman Segar</h6>
                            </a>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                
                                <div class="row d-flex flex-row-reverse ">
                                    <div class="col-3 align-midle ">
                                        <span class="badge bg-success mt-4 me-2">Tersedia</span>
                                    </div>
                                    <div class="col-9">
                                        <h3 class="card-title ">Es Mentimun</h3>
                                    </div>


                                </div>
                                <div class="row price-detail-product-buyer">
                                    <h4 style="font-weight: bold;">Rp. 10000</h4>
                                </div>
                                <div class="row ">
                                    <div class="col sold-detail-product-buyer">
                                        <p style="font-size: small;">Terjual <span>50</span></p>
                                        </div>
                                    <div class="col rate-detail-product-buyer">
                                        <p style="font-size: small; text-align: end;">Rating  
                                            <span class="bi-star-fill text-warning "></span>
                                            <span class="bi-star-fill text-warning"></span>
                                            <span class="bi-star-fill text-warning"></span>
                                            <span class="bi-star-fill text-warning"></span>
                                            <span> (4/5)</span>
                                        </p>
                                    </div>
                                    
                                </div>
                                <hr class="line-divider">

                                <div class="row desc-detail-product-buyer mt-3">
                                    <h5 style="font-size: medium;font-weight:bold">Deskripsi</h5>
                                </div>
                                <div class="row desc-detail-product-buyer" style="font-size: small;">
                                    <p>Kategori Produk : <span>Minuman</span></p>
                                    <p>Jenis Pemesanan : <span>Pre-Order</span></p>
                                    <p>Jadwal Pengantaran : <span>Senin, Rabu, Jumat</span></p>
                                    <p>Detail Produk : <br>
                                        <span> Pre-Order, akan diantar pada hari Senin, Rabu, Jumat Setiap jam 12-18 WITA</span>
                                    </p>
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
                                <h5 class="card-title">Ulasan Produk</h5>
                                <div class="row py-1 mb-1">
                                    <div class="row ">
                                        <div class="col-lg-1 col-md-1 ">
                                        <img src="../assets/img/profil-pict.jpg" alt="" class="rounded-circle img-fluid my-auto mx-auto border border-opacity-25" style="width: auto; height:3rem">
                                        </div>
                                        <div class="col-lg-11 col-md-11">
                                            <div class="row  ">
                                                <h5 class="my-0 " style="font-size: medium;font-weight:bold">
                                                    Siti Mawar  
                                                </h5>
                                            </div>
                                            <div class="row ">
                                                <div class="col my-0">
                                                    <span class="bi-star-fill text-warning "></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                    <div class="row ">
                                        <div class="col">
                                        <p class="my-2"style="font-size: small;">Minuman ini sangat enak</p>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>

                                <div class="row py-1 mb-1">
                                    <div class="row ">
                                        <div class="col-lg-1 col-md-1 ">
                                        <img src="../assets/img/no-image.jpg" alt="" class="rounded-circle img-fluid my-auto mx-auto border border-opacity-25" style="width: auto; height:3rem">
                                        </div>
                                        <div class="col-lg-11 col-md-11">
                                            <div class="row  ">
                                                <h5 class="my-0 " style="font-size: medium;font-weight:bold">
                                                    Melati  
                                                </h5>
                                            </div>
                                            <div class="row ">
                                                <div class="col my-0">
                                                    <span class="bi-star-fill text-warning "></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                    <span class="bi-star-fill text-warning"></span>
                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    
                                    <div class="row ">
                                        <div class="col">
                                        <p class="my-2"style="font-size: small;">Setelah meminum ini tenggorokan saya sangat segar sekali</p>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
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