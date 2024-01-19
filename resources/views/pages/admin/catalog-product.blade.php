@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main data-users">

    <div class="pagetitle">
        <h1>Katalog Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Katalog Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section data-users">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9 ">
                                <h5 class="card-title">Katalog Produk</h5>
                            </div>
                        </div>

                        <div class="row row-cols-2 row-cols-lg-6 g-2 g-lg-6">

                            <div class="col">
                                <div class="card">
                                    <a href="" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                        <img src="assets/img/pancake.jpg" class="card-img-top" alt="Gambar pancake">
                                        <div class="card-body-product">

                                            <h6 class="card-title-product">
                                                pancake
                                            </h6>
                                            <p class="card-text">Rp 10.000</p>
                                        </div>
                                    </a>
                                </div>


                            </div>

                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pancake Keju</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl">
                                                    <div class="image-detail-product-big">
                                                        <img src="assets/img/pancake.jpg" class="rounded mx-auto d-block pb-3" width="200px" height="200px">

                                                    </div>
                                                    <div class="col-xl">
                                                        <form>


                                                            <div class="row mb-3">
                                                                <label for="noproduct" class="col-sm-4 col-form-label">No. Produk</label>
                                                                <div class="col-sm-8">
                                                                    <input name="noproduct" type="text" class="form-control" id="noproduct" value="PAN1" disabled />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="name" class="col-sm-4 col-form-label">Nama Produk</label>
                                                                <div class="col-sm-8">
                                                                    <input name="name" type="text" class="form-control" id="name" value="Pancake Keju" disabled />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="price" class="col-sm-4 col-form-label">Harga</label>
                                                                <div class="col-sm-8">
                                                                    <input name="price" type="text" class="form-control" id="price" value="10.000" disabled />
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="price" class="col-sm-4 col-form-label">Terjual</label>
                                                                <div class="col-sm-8">
                                                                    <input name="sold" type="text" class="form-control" id="sold" value="100" disabled />
                                                                </div>
                                                            </div>


                                                            <div class="row mb-3">
                                                                <label for="status" class="col-sm-4 col-form-label"> Kategori Produk</label>
                                                                <div class="col-sm-8">
                                                                    <select name="status" class="form-select" aria-label="Default select example" disabled>
                                                                        <option selected>Pilih Kategori
                                                                        </option>
                                                                        <option value="1" selected>Makanan</option>
                                                                        <option value="2">Minuman</option>
                                                                        <option value="3">Kerajinan</option>


                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label for="statusproduct" class="col-sm-4 col-form-label">Jenis Pemesanan</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-select" aria-label="Default select example" disabled>
                                                                        <option selected>Pilih Jenis Pemesanan
                                                                        </option>
                                                                        <option value="1" selected>Pre-order</option>
                                                                        <option value="2">Ready Stock
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label for="deskripsi" class="col-sm-4 col-form-label">Detail Produk</label>
                                                                <div class="col-sm-8">
                                                                    <textarea name="deskripsi" class="form-control" style="height: 100px" disabled>#</textarea>
                                                                </div>
                                                            </div>



                                                            <div class="row mb-3">
                                                                <label for="statusproduct" class="col-sm-4 col-form-label">Status Produk</label>
                                                                <div class="col-sm-8">
                                                                    <select class="form-select" aria-label="Default select example" disabled>
                                                                        <option selected>Open this select
                                                                            menu</option>
                                                                        <option value="1" selected>Tersedia
                                                                        </option>
                                                                        <option value="2">Habis
                                                                        </option>

                                                                    </select>
                                                                </div>
                                                            </div>


                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>





                        </div>

                    </div>

                </div>
            </div>
        </div>


    </section>
</main><!-- End #main -->
@endsection