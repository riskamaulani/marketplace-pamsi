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


            <div class="row ">
                <div class="col-lg-12">
                    <div class="card detail-category overflow-auto px-3">
                        <h1 class="card-title ">Rekomendasi Produk {{ $kategori->nama_kategori }}</h1>
                        <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">
                            @if($produk->isEmpty())
                            <p>Tidak ada produk dalam kategori ini.</p>
                            @else

                            @foreach($produk as $pr)
                            <div class="col">
                                <div class="card">
                                    <a href="{{route('detailproduk',['id'=>$pr->id_produk])}}">
                                        <img src="../assets/img/{{$pr->gambar_produk}}" class="card-img-top" alt="Gambar {{$pr->nama_produk}}">
                                        <div class="card-body-product">
                                            <h6 class="card-title-product">{{$pr->nama_produk}}</h6>
                                            <p class="card-text">Rp {{number_format($pr->harga_produk,0)}}</p>
                                        </div>
                                    </a>
                                </div><!-- End Pancake -->
                            </div>
                            @endforeach


                            @endif




                        </div>
                    </div>
                </div>

            </div>

        </div>
</main>
@endsection