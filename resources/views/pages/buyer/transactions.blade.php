@extends('layouts.global-layout', [
'title' => 'Transaksi',
])

@section('content')
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
                        <a href="">
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
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection