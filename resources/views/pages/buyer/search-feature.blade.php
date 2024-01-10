@extends('layouts.global-layout', [
'title' => 'Pencarian',
])

@section('content')
<main>
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card history-transaction overflow-auto">
                    <h1 class="card-title mx-3">Hasil Pencarian</h1>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-12">
                <div class="card search py-2 px-2">
                    <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-3">
                        <div class="col">
                            <div class="card">
                                <a href="detail-product">
                                    <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambarpancake">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            nama produk
                                        </h6>

                                        <p class="card-text">Rp.10.000</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="detail-product">
                                    <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambarpancake">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            nama produk
                                        </h6>

                                        <p class="card-text">Rp.10.000</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="detail-product">
                                    <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambarpancake">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            nama produk
                                        </h6>

                                        <p class="card-text">Rp.10.000</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>

                        <div class="col">
                            <div class="card">
                                <a href="detail-product">
                                    <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambarpancake">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            nama produk
                                        </h6>

                                        <p class="card-text">Rp.10.000</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                        <div class="col">
                            <div class="card">
                                <a href="detail-product">
                                    <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambarpancake">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            nama produk
                                        </h6>

                                        <p class="card-text">Rp.10.000</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection