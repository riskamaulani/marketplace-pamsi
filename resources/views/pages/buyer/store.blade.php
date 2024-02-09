@extends('layouts.global-layout', [
'title' => 'Toko',
])

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card history-transaction overflow-auto">
                <h1 class="card-title mx-3">Kedai Minuman Segar</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">

                <div class="card-body profile-card pt-4 px-4 d-flex flex-column align-items-center">
                    <img src="assets/img/es mentimun.jpg" alt="Profile" class="rounded py-auto px-auto" style=" width: 100%; height:auto" />
                </div>
                <div class="badge bg-success">Buka</div>
            </div>
            <div class="card py-3 px-3">
                <div class="row">
                    <h6>Jadwal Buka</h6>
                </div>
                <div class="row">
                    <h6 style="font-weight:bold;">Senin | Rabu | Jumat</h6>
                </div>
            </div>
            <div class="card py-3 px-3">
                <div class="row">
                    <h6>Tentang Toko</h6>
                </div>
                <div class="row">
                    <h6 style="font-weight:bold;">Menjual minuman segar</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-9 ">


            <div class="card product-store">
                <div class="col px-3 py-3">
                    <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">

                        <div class="col">
                            <div class="card">
                                <a href="">
                                    <img src="assets/img/es mentimun.jpg" class="card-img-top" alt="Es Mentimun">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            es mentimun
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
    @endsection