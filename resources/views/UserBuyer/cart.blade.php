@extends('layouts.master_layout')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/layouts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
@endsection
@section('containers')

<main class="main cart-buyer">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card cart overflow-auto">
                    <h1 class="card-title mx-3">Keranjang</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card cart overflow-auto">


                    <div class="card-body">
                        <div class="row my-3 mx-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1" />
                                <label class="form-check-label" for="gridCheck1">
                                    Pilih Semua
                                </label>
                            </div>
                        </div>
                        <hr class="line-divider">
                        <div class="row  mx-2">
                            <div class="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" />
                                    <label class="form-check-label" for="gridCheck1" style="font-weight: 500;">
                                        Fluffy Pancake Store
                                    </label>
                                </div>

                            </div>
                            <div class="row  my-2 mx-1">
                                <div class="col-sm-5"> Pancake Bluberry</div>
                                <div class="col-sm-3">Rp20.000</div>
                                <div class="col-sm-2">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary btn-sm">-</button>
                                        <button type="button" class="btn btn-primary btn-sm">1</button>
                                        <button type="button" class="btn btn-primary btn-sm">+</button>
                                    </div>
                                </div>
                                <div class="col-sm-2 d-flex justify-content-end">
                                    <a href="" style="color: grey;"><i class="bi bi-trash"></i></a>

                                </div>

                            </div>
                            <hr class="line-divider">
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card cart overflow-auto">

                    <div class="card-body">
                        <h1 class="card-title">Ringkasan</h1>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Jumlah Produk</h6>
                            </div>
                            <div class="col d-flex justify-content-end">2</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">Rp40.000</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Ongkos Kirim</h6>
                            </div>
                            <div class="col d-flex justify-content-end">-</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Diskon</h6>
                            </div>
                            <div class="col d-flex justify-content-end">-Rp4.000</div>
                        </div>
                        <hr class="line-divider">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 style="font-weight: bold;">Rp34.000</h6>
                            </div>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-primary" type="submit">Checkout</button>
                        </div>
                        </hr>

                    </div>

                </div>


            </div>



        </div>
</main>

@endsection