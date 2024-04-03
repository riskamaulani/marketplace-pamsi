@extends('layouts.global-layout', [
    'title' => 'Kategori',
])

@section('content')
    <main>
        <div class="container">
            <div class="row ">
                <div class="row ">
                    <div class="col-lg-12">
                        <div class="card detail-category overflow-auto px-3">
                            <h1 class="card-title ">Rekomendasi Produk {{ $kategori->nama_kategori }}</h1>
                            <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">
                                

                                @forelse ($kategori as $kt)
                                <div class="col">
                                    <div class="card">
                                        <a href="{{ route('produk.detail',[$kategori->produk_id]) }}">
                                            <img src="{{ asset('storage/'.$kategori->gambar_produk) }}" class="card-img-top" alt="Gambar {{ $kategori->nama_produk }}">
                                            <div class="card-body-product">

                                                <h6 class="card-title-product">
                                                    {{ $kategori->nama_produk }}
                                                </h6>


                                                <p class="card-text">Rp {{ number_format($kategori->harga_produk, 0) }}</p>
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
