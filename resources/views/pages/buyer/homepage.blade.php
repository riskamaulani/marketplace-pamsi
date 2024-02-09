@extends('layouts.global-layout')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <div class="col">
            <div class="card px-0 py-0  d-flex flex-column">
                <img src="../assets/img/header-foto.png" alt="..." class="rounded py-0 px-0" style=" width: 100%; height:auto">
            </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-lg-6 ">
                <div class="card px-3">
                    <h1 class="card-title">Penawaran Hari Ini</h1>
                    <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                    @forelse ($produk as $pr)
                    <div class="col">
                        <div class="card">
                            <a href="{{ route('produk.detail') }}">
                                <img src="{{ 'storage/'.$pr->gambar }}" class="card-img-top" alt="Gambar {{ $pr->nama }}">
                                <div class="card-body-product">

                                    <h6 class="card-title-product">
                                        {{ $pr->nama }}
                                    </h6>


                                    <p class="card-text">Rp {{ number_format($pr->harga, 0) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    Tidak ada produk
                    @endforelse

            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card overflow-auto px-3">
            <h1 class="card-title">Produk Teratas</h1>
            <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3">
                 @forelse ($produk as $pr)
                    <div class="col">
                        <div class="card">
                            <a href="{{ route('produk.detail') }}">
                                <img src="{{ 'storage/'.$pr->gambar }}" class="card-img-top" alt="Gambar {{ $pr->nama }}">
                                <div class="card-body-product">

                                    <h6 class="card-title-product">
                                        {{ $pr->nama }}
                                    </h6>


                                    <p class="card-text">Rp {{ number_format($pr->harga, 0) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    Tidak ada produk
                    @endforelse
    </div>
    </div>
    </div>
    </div>
    
        <div class="row ">
        <div class="col-lg-12">
            <div class="card category px-3 pb-3">
                <h1 class="card-title ">Kategori</h1>
                <div class="row">
                    <div class="col">

                        @foreach ($kategori as $kt)
                        <a href="">
                            <button type="button" class="btn btn-success my-1 px-3">
                                {{ $kt->nama }}
                            </button>
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
                    @forelse ($produk as $pr)
                    <div class="col">
                        <div class="card">
                            <a href="{{ route('produk.detail') }}">
                                <img src="{{ 'storage/'.$pr->gambar }}" class="card-img-top" alt="Gambar {{ $pr->nama }}">
                                <div class="card-body-product">

                                    <h6 class="card-title-product">
                                        {{ $pr->nama }}
                                    </h6>


                                    <p class="card-text">Rp {{ number_format($pr->harga, 0) }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    @empty
                    Tidak ada produk
                    @endforelse
                </div>
            </div>
        </div>
    </div>
        
    </div>
</main>
@endsection