@extends('layouts.master_layout')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/layouts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="assets/css/style.css" rel="stylesheet">
@endsection
@section('containers')

<main class="main checkout-buyer">
    <div class="container ">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card checkout overflow-auto">
                    <h1 class="card-title mx-3">Checkout</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8">
                <div class="card checkout overflow-auto">


                    <div class="card-body">
                        <table class="table datatable checkout-buyer mt-2">
                            <thead>
                                <tr class="checkout-product-subtitle">
                                    <td scope="col-sm-2" style="font-weight :500;color:black">Produk</td>
                                    <td scope="col-sm-2x" style="font-weight:500;color:black">Jumlah</td>
                                    <td scope="col-sm-2x" style="font-weight:500;color:black">Harga satuan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="#"><img src="assets/img/pancake1.jpg" alt="" class="rounded" width="70px" height="auto"></a>
                                            </div>
                                            <div class="col-sm-9">
                                                Pancake Bluberry
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>12.000</td>

                                </tr>

                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Metode Pengiriman</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example">

                                            <option value="1" selected>Ambil sendiri</option>
                                            <option value="2">Via Kurir (Daerah Mataram) Rp10.000</option>
                                            <option value="3">Via Kurir (Daerah Lombok Barat & Lombok Tengah) Rp15.000</option>
                                            <option value="4">Via Kurir (Daerah Lombok Timur) Rp.50.000</option>
                                            <option value="4">Via Kurir (Luar Pulau Lombok) Hubungi Toko</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label"></label>

                                    <div class="col-sm-8">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Masukkan alamat untuk pengguna kurir" id="alamatPembeli" style="height: 100px"></textarea>
                                            <label for="alamatPembeli">Alamat untuk pengguna kurir</label>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label" style="font-weight: 500;color:black">Metode Pembayaran</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example">

                                            <option value="1" selected>COD</option>
                                            <option value="2">Transfer Bank NTB Syariah (535219875648 - Madrasah Alam Sayang Ibu)</option>
                                            <option value="3">E-Wallet DANA (0821379473628 - Madrasah Alam Sayang Ibu) </option>

                                        </select>
                                    </div>
                                </div>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card checkout overflow-auto">

                    <div class="card-body">
                        <h1 class="card-title">Ringkasan</h1>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Jumlah Produk</h6>
                            </div>
                            <div class="col d-flex justify-content-end">2</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">Rp40.000</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Ongkos Kirim</h6>
                            </div>
                            <div class="col d-flex justify-content-end">-</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Diskon</h6>
                            </div>
                            <div class="col d-flex justify-content-end">-Rp4.000</div>
                        </div>
                        <hr class="line-divider">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 style="font-weight: bold;">Rp34.000</h6>
                            </div>
                        </div>
                        </hr>

                    </div>

                </div>
                <div class="card checkout overflow-auto">
                    <div class="card-body">
                        <h1 class="card-title">Unggah Bukti Pembayaran</h1>

                        <div class="row mb-3">

                            <div class="col">
                                <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" data-bs-toggle="modal" data-bs-target="#buttonOrderNow">Buat Pesanan Sekarang</button>
                            <div class="modal fade" id="buttonOrderNow" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Pesan Sekarang</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah anda yakin untuk pesan sekarang?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-primary">Pesan Sekarang</button>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->

                        </div>
                    </div>
                </div>

            </div>
        </div>
</main>

@endsection