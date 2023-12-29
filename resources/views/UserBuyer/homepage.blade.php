@extends('layouts.master_layout')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/layouts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
@endsection
@section('containers')

<main>
    <div class="container">
        <div class="row ">
            <div class="col-lg-6 ">
                <div class="card overflow-auto px-3">
                    <h1 class="card-title">Penawaran Hari Ini</h1>
                    <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                        @foreach($penawaran as $pn)
                        <div class="col">
                            <div class="card">
                                <a href="detail-product/{{$pn->id_produk}}">
                                    <img src="assets/img/{{$pn->gambar_produk}}" class="card-img-top" alt="Gambar {{$pn->nama_produk}}">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            {{$pn->nama_produk}}
                                        </h6>

                                        <p class="card-text">Rp. {{number_format($pn->harga_produk,0)}}</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card overflow-auto px-3">
                    <h1 class="card-title">Produk Teratas</h1>
                    <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                        @foreach($teratas as $tr)
                        <div class="col">
                            <div class="card">
                                <a href="detail-product/{{$tr->id_produk}}">
                                    <img src="assets/img/{{$tr->gambar_produk}}" class="card-img-top" alt="Gambar {{$tr->nama_produk}}">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                            {{$tr->nama_produk}}
                                        </h6>

                                        <p class="card-text">Rp. {{number_format($tr->harga_produk,0)}}</p>
                                    </div>
                                </a>
                            </div><!-- End Pancake -->
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card checkout overflow-auto px-3 pb-3">
                        <h1 class="card-title ">Kategori</h1>
                        <div class="row">
                            <div class="col">
                                @foreach($kategori as $kt)
                                <a href="/detail-category/{{$kt->id_kategori}}">
                                    <button type="button" class="btn btn-success my-1 px-3">{{$kt->nama_kategori}}</button>

                                </a>
                                @endforeach

                            </div>


                        </div>
                    </div>
                </div>

            </div>
            <div class="row ">
                <div class="col-lg-12">
                    <div class="card product overflow-auto px-3">
                        <h1 class="card-title ">Rekomendasi Produk</h1>
                        <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">
                            @foreach($produk as $pr)
                            <div class="col">
                                <div class="card">
                                    <a href="detail-product/{{$pr->id_produk}}">
                                        <img src="assets/img/{{$pr->gambar_produk}}" class="card-img-top" alt="Gambar {{$pr->nama_produk}}">
                                        <div class="card-body-product">

                                            <h6 class="card-title-product">
                                                {{$pr->nama_produk}}
                                            </h6>


                                            <p class="card-text">Rp {{number_format($pr->harga_produk,0)}}</p>
                                        </div>
                                    </a>
                                </div><!-- End Pancake -->
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>




        </div>
</main>
@endsection