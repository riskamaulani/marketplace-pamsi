@extends('layouts.master_layout')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/layouts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
@endsection
@section('containers')
<main class="main history-transaction-buyer">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card history-transaction overflow-auto">
                    <h1 class="card-title mx-3">Pesanan Saya</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body py-3">

                        <!-- Default Tabs -->
                        <ul class="nav nav-tabs d-flex" id="myTabjustified" role="tablist">
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100 active" id="allOrder-tab" data-bs-toggle="tab" data-bs-target="#allOrder-justified" type="button" role="tab" aria-controls="allOrder" aria-selected="true">Semua</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="notPaid-tab" data-bs-toggle="tab" data-bs-target="#notPaid-justified" type="button" role="tab" aria-controls="notPaid" aria-selected="false">Belum Bayar</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="packaged-tab" data-bs-toggle="tab" data-bs-target="#packaged-justified" type="button" role="tab" aria-controls="packaged" aria-selected="false">Sedang Dikemas</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="sent-tab" data-bs-toggle="tab" data-bs-target="#sent-justified" type="button" role="tab" aria-controls="sent" aria-selected="false">Dikirim</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="done-tab" data-bs-toggle="tab" data-bs-target="#done-justified" type="button" role="tab" aria-controls="done" aria-selected="false">Selesai</button>
                            </li>
                            <li class="nav-item flex-fill" role="presentation">
                                <button class="nav-link w-100" id="canceled-tab" data-bs-toggle="tab" data-bs-target="#canceled-justified" type="button" role="tab" aria-controls="canceled" aria-selected="false">Dibatalkan</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2" id="myTabjustifiedContent">
                            <hr class="line-divider">
                            <div class="tab-pane fade show active" id="allOrder-justified" role="tabpanel" aria-labelledby="allOrder-tab">

                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-success">Sedang Dikirim</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">


                                </div>
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Pizza Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pizza Plecing</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp50.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-warning">Sedang Dikemas</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">


                                </div>
                            </div>
                            <div class="tab-pane fade" id="notPaid-justified" role="tabpanel" aria-labelledby="notPaid-tab">
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-secondary">Belum Dibayar</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="packaged-justified" role="tabpanel" aria-labelledby="packaged-tab">
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-warning">Sedang Dikemas</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="sent-justified" role="tabpanel" aria-labelledby="sent-tab">
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-success">Sedang Dikirim</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="done-justified" role="tabpanel" aria-labelledby="done-tab">
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-secondary">Selesai</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canceled-justified" role="tabpanel" aria-labelledby="canceled-tab">
                                <div class="row  mx-2">
                                    <div class="row" style="font-weight: bold;">
                                        Fluffy Pancake Store

                                    </div>
                                    <div class="row  my-2">
                                        <div class="col-sm-4">Pancake Bluberry</div>
                                        <div class="col-sm-3">x1</div>
                                        <div class="col-sm-3">Rp34.000</div>
                                        <div class="col-sm-2 d-flex justify-content-center">
                                            <span class="badge bg-danger">Dibatalkan</span>
                                        </div>

                                    </div>
                                    <hr class="line-divider">
                                </div>
                            </div>
                        </div><!-- End Default Tabs -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection