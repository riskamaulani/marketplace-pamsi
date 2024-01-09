@extends('layouts.panel-layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Produk</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Produk</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section seller-data-products">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 ">
                                    <h5 class="card-title">Data Produk</h5>
                                </div>
                                <div class="col-3 d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalAddNewProduct">
                                        <i class="bi bi-plus"></i>Tambah Produk
                                    </button>

                                    <div class="modal fade" id="modalAddNewProduct" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Produk</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-xl">
                                                            <div class="image-detail-product-big">
                                                                <img src="" class="rounded mx-auto d-block"
                                                                    width="200px" height="200px">

                                                            </div>
                                                            <div class="col-xl">
                                                                <form>
                                                                    <div class="row mb-3">
                                                                        <label for="profileImage"
                                                                            class="col-sm-4 col-form-label">Gambar
                                                                            Profil</label>
                                                                        <div class="col-sm-8">

                                                                            <div class="pt-2">
                                                                                <a href="#"
                                                                                    class="btn btn-sm btn-primary"
                                                                                    title="Upload new profile image"><i
                                                                                        class="bi bi-upload"></i></a>
                                                                                <a href="#"
                                                                                    class="btn btn-danger btn-sm"
                                                                                    title="Remove my profile image"><i
                                                                                        class="bi bi-trash"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="row mb-3">
                                                                        <label for="noproduct"
                                                                            class="col-sm-4 col-form-label">No.
                                                                            Produk</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="noproduct" type="text"
                                                                                class="form-control" id="noproduct"
                                                                                value="#" />
                                                                        </div>
                                                                    </div> --}}

                                                                    <div class="row mb-3">
                                                                        <label for="name"
                                                                            class="col-sm-4 col-form-label">Nama
                                                                            Produk</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="name" type="text"
                                                                                class="form-control" id="name" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="harga"
                                                                            class="col-sm-4 col-form-label">Harga</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="harga" type="text"
                                                                                class="form-control" id="harga" />
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="kategori"
                                                                            class="col-sm-4 col-form-label">Jenis
                                                                            Produk</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="kategori" type="text"
                                                                                class="form-control" id="kategori" />
                                                                        </div>
                                                                    </div>

                                                                    {{-- <div class="row mb-3">
                                                                        <label for="statusproduct"
                                                                            class="col-sm-4 col-form-label">Jenis
                                                                            Pemesanan</label>
                                                                        <div class="col-sm-8">
                                                                            <select class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Open this select menu
                                                                                </option>
                                                                                <option value="1">Pre-order</option>
                                                                                <option value="2">Langsung diantar
                                                                                </option>

                                                                            </select>
                                                                        </div>
                                                                    </div> --}}

                                                                    {{-- <div class="row mb-3">
                                                                        <label for="minOrder"
                                                                            class="col-sm-4 col-form-label">Minimal
                                                                            Pemesanan</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="minOrder" type="text"
                                                                                class="form-control" id="minOrder"
                                                                                value="#" />
                                                                        </div>
                                                                    </div> --}}

                                                                    {{-- <div class="row mb-3">
                                                                        <label for="scheduleDelivery"
                                                                            class="col-sm-4 col-form-label">Jadwal
                                                                            Pengantaran</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="scheduleDelivery" type="text"
                                                                                class="form-control" id="scheduleDelivery"
                                                                                value="#" />
                                                                        </div>
                                                                    </div> --}}

                                                                    <div class="row mb-3">
                                                                        <label for="deskripsi"
                                                                            class="col-sm-4 col-form-label">Detail
                                                                            Produk</label>
                                                                        <div class="col-sm-8">
                                                                            <textarea name="deskripsi" class="form-control" style="height: 100px">#</textarea>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="status"
                                                                            class="col-sm-4 col-form-label">Status
                                                                            Produk</label>
                                                                        <div class="col-sm-8">
                                                                            <select name="status" class="form-select"
                                                                                aria-label="Default select example">
                                                                                <option selected>Open this select menu
                                                                                </option>
                                                                                <option value="1">Tersedia</option>
                                                                                <option value="2">Habis</option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="button" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col-sm-1">#</th>
                                        <th scope="col-sm-1">No. Produk</th>
                                        <th scope="col-sm-2">Foto</th>
                                        <th scope="col-sm-2">Nama Produk</th>
                                        <th scope="col-sm-2">Harga</th>
                                        <th scope="col-sm-2">Stok</th>
                                        <th scope="col-sm-2">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <th scope="row">PAN1</th>
                                        <td>
                                            <a href="#"><img src="assets/img/pancake.jpg" alt=""
                                                    class="rounded" width="100px" height="auto"></a>
                                        </td>
                                        <td>
                                            <a href="" data-bs-toggle="modal"
                                                data-bs-target="#modalDialogScrollable">Pancake Keju</a>
                                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Pancake Keju</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xl">
                                                                    <div class="image-detail-product-big">
                                                                        <img src="assets/img/pancake.jpg"
                                                                            class="rounded mx-auto d-block" width="200px"
                                                                            height="200px">

                                                                    </div>
                                                                    <div class="col-xl">
                                                                        <form>
                                                                            <div class="row mb-3">
                                                                                <label for="profileImage"
                                                                                    class="col-sm-4 col-form-label">Gambar
                                                                                    Profil</label>
                                                                                <div class="col-sm-8">

                                                                                    <div class="pt-2">
                                                                                        <a href="#"
                                                                                            class="btn btn-sm btn-primary"
                                                                                            title="Upload new profile image"><i
                                                                                                class="bi bi-upload"></i></a>
                                                                                        <a href="#"
                                                                                            class="btn btn-danger btn-sm"
                                                                                            title="Remove my profile image"><i
                                                                                                class="bi bi-trash"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="noproduct"
                                                                                    class="col-sm-4 col-form-label">No.
                                                                                    Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="noproduct" type="text"
                                                                                        class="form-control"
                                                                                        id="noproduct" value="PAN1" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="name"
                                                                                    class="col-sm-4 col-form-label">Nama
                                                                                    Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="name" type="text"
                                                                                        class="form-control"
                                                                                        id="name"
                                                                                        value="Pancake Keju" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="price"
                                                                                    class="col-sm-4 col-form-label">Harga</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="price" type="text"
                                                                                        class="form-control"
                                                                                        id="price" value="10.000" />
                                                                                </div>
                                                                            </div>


                                                                            <div class="row mb-3">
                                                                                <label for="stock"
                                                                                    class="col-sm-4 col-form-label">Stok</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="stock" type="text"
                                                                                        class="form-control"
                                                                                        id="stock" value="-" />
                                                                                </div>
                                                                            </div>



                                                                            <div class="row mb-3">
                                                                                <label for="statusproduct"
                                                                                    class="col-sm-4 col-form-label">Status
                                                                                    Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-select"
                                                                                        aria-label="Default select example">
                                                                                        <option selected>Open this select
                                                                                            menu</option>
                                                                                        <option value="1">Tersedia
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
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-primary">Simpan
                                                                Perubahan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>10.000</td>
                                        <td>20</td>
                                        <td><span class="badge bg-success">Tersedia</span></td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th scope="row">2</th>
                                        <th scope="row">PAN2</th>
                                        <td>
                                            <a href="#"><img src="assets/img/pancake1.jpg" alt=""
                                                    class="rounded" width="100px" height="auto"></a>
                                        </td>
                                        <td>
                                            <a href="">Pancake Blueberry</a>
                                        </td>
                                        <td>12.000</td>
                                        <td>0</td>
                                        <td><span class="badge bg-secondary">Habis</span></span></td>
                                    </tr>
                                </tbody>


                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
