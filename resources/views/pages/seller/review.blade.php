@extends('layouts.panel-layout')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Ulasan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Ulasan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section data-users">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-9 ">
                                <h5 class="card-title">Ulasan Produk</h5>
                            </div>
                        </div>

                        <!-- ulasan -->
                        <div class="row border rounded mx-1 mb-3">
                            <div class="col ">
                                <div class="row border rounded-top" style="background-color: #EFECEC;">
                                    <div class="col " style="font-weight: bold;">
                                        #PO12345678
                                    </div>
                                    <div class="col ">
                                        Es Mentimun (2x)
                                    </div>
                                    <div class="col   d-md-flex justify-content-md-center">
                                        COD (Rp0)
                                    </div>
                                    <div class="col d-md-flex justify-content-md-end">
                                    Rp.20.000
                                    </div>
                                </div>
                                <div class="row mt-2">
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
                            </div>
                        </div>
                        <!-- akhir ulasan -->

                        
                        <!-- ulasan -->
                        <div class="row border rounded mx-1 mb-3">
                            <div class="col ">
                                <div class="row border rounded-top" style="background-color: #EFECEC;">
                                    <div class="col " style="font-weight: bold;">
                                        #PO09329348
                                    </div>
                                    <div class="col ">
                                        Es Mentimun (3x)
                                    </div>
                                    <div class="col   d-md-flex justify-content-md-center">
                                        Kurir (Rp10.000)
                                    </div>
                                    <div class="col d-md-flex justify-content-md-end">
                                    Rp.40.000
                                    </div>
                                </div>
                                <div class="row mt-2">
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
                            </div>
                        </div>
                        <!-- akhir ulasan -->

                    </div>

                </div>
            </div>
        </div>
        


        </section>

    </main><!-- End #main -->
@endsection
