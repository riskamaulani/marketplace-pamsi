@extends('layouts.global-layout', [
'title' => 'Toko',
])

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card history-transaction overflow-auto">
                <h1 class="card-title mx-3">{{$toko->nama}}</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card">

                <div class="card-body profile-card pt-4 px-4 d-flex flex-column align-items-center">
                    <img src="{{ asset('storage/'.$toko->foto) }}" alt="Profile" class="rounded py-auto px-auto" style=" width: 100%; height:auto" />
                </div>
                <span @class([
                                    'badge',
                                    'bg-success' => $toko->status->isBuka(),
                                    'bg-secondary' => $toko->status->isTutup(),
                                ])>{{ $toko->status->getLabelText() }}</span>
            </div>
            <div class="card py-3 px-3">
                <div class="row">
                    <h6>Jadwal Buka</h6>
                </div>
                <div class="row">
                    <h6 style="font-weight:bold;">{{ App\Actions\ConvertToDayOfWeek::handle($toko->buka) ?? '-' }}</h6>
                </div>
            </div>
            <div class="card py-3 px-3">
                <div class="row">
                    <h6>Tentang Toko</h6>
                </div>
                <div class="row">
                    <h6 style="font-weight:bold;">{{$toko->deskripsi}}</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-9 ">


            <div class="card product-store">
                <div class="col px-3 py-3">
                    <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">
                        @forelse ($toko as $tk)
                        <div class="col">
                            <div class="card">
                                <a href="{{ route('produk.detail',[$toko->produk_id]) }}">
                                    <img src="{{ asset('storage/'.$toko->gambar_produk)}}" class="card-img-top" alt="Gambar {{ $toko->nama_produk }}">
                                    <div class="card-body-product">

                                        <h6 class="card-title-product">
                                        {{ $toko->nama_produk}}
                                        </h6>


                                        <p class="card-text">Rp {{ number_format($toko->harga_produk, 0) }}</p>
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
    @endsection