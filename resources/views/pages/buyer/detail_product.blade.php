@extends('layouts.global-layout', [
'title' => 'Produk',
])

@section('content')
<main class="main detail-product">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">

                <div class="card detail-product-buyer  px-1 py-1  d-flex flex-column">
                    <img src="../storage/{{$data->gambar}}" alt="..." class="rounded py-auto px-auto" style=" width: 100%; height:auto">
                </div>
                <div class="card detail-product-buyer overflow-auto ">
                    <div class="row  py-2 mx-auto">
                        <div class="col-4  d-flex flex-column my-auto mx-auto">
                            <img src="../storage/{{$data->gambar}}" alt="" class="rounded-circle img-fluid mb-1" style="width: 100%; height:auto">
                            <span @class([
                            'badge',
                            'bg-success' => $data->toko->status->isBuka(),
                            'bg-secondary' => $data->toko->status->isTutup(),
                        ])>{{ $data->toko->status->getLabelText() }}</span>
                        </div>
                        <div class="col-8 ">
                            <a href="{{ route('store',[$data->toko_id]) }}">
                                <h4 class="card-title ">{{$data->nama_toko}}</h4>
                            </a>


                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card detail-product-buyer overflow-auto ">


                    <div class="card-body">
                        <div class="row d-flex flex-row-reverse ">
                            <div class="col-3 align-midle  ">
                                
                                <span @class([
                                    'badge mt-4 me-2',
                                    'bg-success' => $data->status->isTersedia(),
                                    'bg-secondary' => $data->status->isHabis(),
                                ])>{{ $data->status->getLabelText() }}</span>
                            </div>
                            <div class="col-9">
                                <h3 class="card-title ">{{$data->nama}}</h3>
                            </div>


                        </div>
                        <div class="row price-detail-product-buyer">
                            <h4 style="font-weight: bold;">Rp {{ number_format($data->harga, 0) }}</h4>
                        </div>
                        <div class="row ">
                            <div class="col sold-detail-product-buyer">
                                <p style="font-size: small;">Terjual <span>{{$data->terjual}}</span></p>
                                </div>
                            <div class="col rate-detail-product-buyer">
                                <p style="font-size: small; text-align: end;">Rating  
                                    <span class="bi-star-fill text-warning "></span>
                                    <span class="bi-star-fill text-warning"></span>
                                    <span class="bi-star-fill text-warning"></span>
                                    <span class="bi-star-fill text-warning"></span>
                                    <span> (4/5)</span>
                                </p>
                            </div>
                            
                        </div>
                        

                        

                        <hr class="line-divider">

                        <div class="row desc-detail-product-buyer mt-3">
                            <h5 style="font-size: medium;font-weight:bold">Deskripsi</h5>
                        </div>
                        <div class="row desc-detail-product-buyer" style="font-size: small;">
                            <p>Kategori Produk : <span>{{$data->nama_kat}}</span></p>
                            <p>Jenis Pemesanan : <span>{{$data->order_type}}</span></p>
                            <p>Jadwal Pengantaran : <span>{{ App\Actions\ConvertToDayOfWeek::handle($data->toko->buka) ?? '-' }}</span></p>
                            <p>Detail Produk : <br>
                                <span> {{$data->deskripsi}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card detail-product-buyer overflow-auto px-3 ">
                    <h1 class="card-title ">Atur Pesanan</h1>

                    <form action="{{ route('produk.proses') }}" method="POST"
                                        enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="row mb-2">
                        <div class="col-4">
                            <img src="../storage/{{$data->gambar}}" alt="" class="rounded float-left" style="width: 100%; height:auto">
                        </div>
                        <div class="col-8 ">
                            <h6 class="text-left">{{$data->nama}}</h6>
                        </div>
                    </div>
                    <div class="btn-toolbar my-2" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-primary btn-sm">-</button>
                            <!-- jumlahnya bisa pake button atau edit -->
                            <input type="hidden" class="btn btn-primary btn-sm" name="user_id" value="{{Auth::user()->id}}" />
                            <input type="hidden" class="btn btn-primary btn-sm" name="produk_id" value="{{$data->id}}" />
                            <input type="text" class="btn btn-primary btn-sm " style="width: 3rem;" name="count" value="1"required />
                           
                            <button type="button" class="btn btn-primary btn-sm">+</button>

                        </div>


                    </div>


                    <div class="submit-order mb-3 d-grid gap-1 d-md-flex justify-content-md-end">
                        <button class="btn btn-secondary" name="action" value="keranjang" type="submit">Keranjang</button>
                        <!-- <button class="btn btn-primary" type="button">Pesan Sekarang</button> -->
                        <button class="btn btn-success" name="action" value="pesan" type="submit">Pesan Sekarang</button>
                    </div>

                    </form>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card product-review px-3 pb-3">
                    <h1 class="card-title">Ulasan Produk</h1>
                    <div class="row py-1 mb-1">
                        <div class="row ">
                            <div class="col-lg-1 col-md-1 ">
                            <img src="../assets/img/profil-pict.jpg" alt="" class="rounded-circle img-fluid my-auto mx-auto border border-opacity-25" style="width: auto; height:3rem">
                            </div>
                            <div class="col-lg-11 col-md-11">
                                <div class="row  ">
                                    <h5 class="my-0 " style="font-size: medium;font-weight:bold">
                                        Siti Mawar  
                                    </h5>
                                </div>
                                <div class="row ">
                                    <div class="col my-0">
                                        <span class="bi-star-fill text-warning "></span>
                                        <span class="bi-star-fill text-warning"></span>
                                        <span class="bi-star-fill text-warning"></span>
                                        <span class="bi-star-fill text-warning"></span>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="row ">
                            <div class="col">
                            <p class="my-2"style="font-size: small;">Minuman ini sangat enak</p>
                            </div>

                        </div>
                        <hr class="line-divider">
                    </div>

                    <div class="row py-1 mb-1">
                        <div class="row ">
                            <div class="col-lg-1 col-md-1 ">
                            <img src="../assets/img/no-image.jpg" alt="" class="rounded-circle img-fluid my-auto mx-auto border border-opacity-25" style="width: auto; height:3rem">
                            </div>
                            <div class="col-lg-11 col-md-11">
                                <div class="row  ">
                                    <h5 class="my-0 " style="font-size: medium;font-weight:bold">
                                        Melati  
                                    </h5>
                                </div>
                                <div class="row ">
                                    <div class="col my-0">
                                        <span class="bi-star-fill text-warning "></span>
                                        <span class="bi-star-fill text-warning"></span>
                                        <span class="bi-star-fill text-warning"></span>
                                        <span class="bi-star-fill text-warning"></span>
                                        <span class="bi-star-fill text-warning"></span>
                                    </div>
                                </div>
                                
                            </div>

                        </div>
                        
                        <div class="row ">
                            <div class="col">
                            <p class="my-2"style="font-size: small;">Setelah meminum ini tenggorokan saya sangat segar sekali</p>
                            </div>

                        </div>
                        <hr class="line-divider">
                    </div>
                    
                    
                   

                </div>
            </div>
        </div>
        
        




</main>
@endsection