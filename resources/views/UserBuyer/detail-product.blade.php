@extends('layouts.master_layout')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/layouts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
@endsection
@section('containers')

<main class="main detail-product-buyer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <div class="card detail-product-buyer  px-1 py-1  d-flex flex-column">
                    <img src="../assets/img/{{$produk->gambar_produk}}" alt="..." class="rounded py-auto px-auto" style=" width: 100%; height:auto">
                </div>
                <div class="card detail-product-buyer overflow-auto ">
                    <div class="row  py-2 mx-auto">
                        <div class="col-4  d-flex flex-column my-auto mx-auto">
                            <img src="../assets/img/{{$produk->penjual->gambar_toko}}" alt="" class="rounded-circle img-fluid mb-1" style="width: 100%; height:auto">
                            <span class="badge bg-success">Buka</span>
                        </div>
                        <div class="col-8 ">
                            <a href="">
                                <h1 class="card-title ">{{$produk->penjual->nama_toko}}</h1>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card detail-product-buyer overflow-auto ">


                    <div class="card-body">
                        <div class="row d-flex flex-row-reverse ">
                            <div class="col-3 align-midle ">
                                <span class="badge bg-success mt-4 me-2">Tersedia</span>
                            </div>
                            <div class="col-9">
                                <h1 class="card-title ">{{$produk->nama_produk}}</h1>
                            </div>


                        </div>
                        <div class="row price-detail-product-buyer">
                            <h4 style="font-weight: bold;">Rp. {{number_format($produk->harga_produk,0)}}</h4>
                        </div>
                        <div class="row sold-detail-product-buyer">
                            <p style="font-size: small;">Terjual 50</p>
                        </div>

                        <hr class="line-divider">
                        <div class="row price-detail-product-buyer mt-3">
                            <h5 style="font-size: medium;font-weight:bold">Atur Jadwal Pengiriman</h5>
                        </div>
                        <div class="row day-delivery-detail-product-buyer">

                            <label for="day-delivery" class="col-7 col-form-label " style="font-weight:400;color:black">
                                <h6>Hari Pengiriman</h6>
                            </label>
                            <div class="col-5">
                                <select class="form-select " aria-label="Default select example">
                                    <option selected>Pilih hari</option>
                                    <option value="1">Senin</option>
                                    <option value="2" disabled>Selasa</option>
                                    <option value="3">Rabu</option>
                                    <option value="4" disabled>Kamis</option>
                                    <option value="5">Jumat</option>
                                    <option value="6" disabled>Sabtu</option>
                                    <option value="7">Minggu</option>

                                </select>
                            </div>
                        </div>
                        <div class="row hour-delivery-detail-product-buyer">
                            <label for="hour-delivery" class="col-7 col-form-label " style="font-weight:400;color:black">
                                <h6>Jam Pengiriman</h6>
                            </label>
                            <div class="col-5">
                                <select class="form-select " aria-label="Default select example">
                                    <option selected>Pilih Jam</option>
                                    <option value="1">10-12</option>
                                    <option value="2" disabled>12-14</option>
                                    <option value="3">12-16</option>
                                    <option value="4" disabled>16-18</option>
                                </select>
                            </div>
                        </div>
                        <hr class="line-divider">

                        <div class="row desc-detail-product-buyer mt-3">
                            <h5 style="font-size: medium;font-weight:bold">Deskripsi</h5>
                        </div>
                        <div class="row desc-detail-product-buyer" style="font-size: small;">
                            <p>Jenis Produk : <span>Makanan</span></p>
                            <p>Jadwal Pengantaran : <span>Senin, Rabu, Jumat, Minggu</span></p>
                            <p>Detail Produk : <br>
                                <span> {{$produk->deskripsi}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card detail-product-buyer overflow-auto px-3 ">
                    <h1 class="card-title ">Atur Pesanan</h1>


                    <div class="row mb-2">
                        <div class="col-4">
                            <img src="../assets/img/{{$produk->gambar_produk}}" alt="" class="rounded float-left" style="width: 100%; height:auto">
                        </div>
                        <div class="col-8 ">

                            <h6 class="text-left">{{$produk->nama_produk}}</h6>


                        </div>
                    </div>
                    <div class="btn-toolbar my-2" role="toolbar" aria-label="Toolbar with button groups">
                        <div class="btn-group" role="group" aria-label="First group">
                            <button type="button" class="btn btn-primary btn-sm">-</button>
                            <button type="button" class="btn btn-primary btn-sm disable">2</button>
                            <button type="button" class="btn btn-primary btn-sm">+</button>

                        </div>


                    </div>

                    <label for="basic-url" style="font-size: small;">
                        Tambah catatan (opsional) :
                    </label>
                    <div class="input-group mb-3">

                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>
                    <div class="submit-order mb-3 d-grid gap-1 d-md-flex justify-content-md-end">
                        <input class="btn btn-secondary " type="submit" value="Keranjang">

                        <input class="btn btn-primary" type="submit" value="Pesan Sekarang">
                    </div>

                </div>
            </div>
        </div>



    </div>


    </div>
</main>

@endsection