@extends('UserSeller.layout-seller')
@section('styles')
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

@section('main_admin')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Transaksi</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section seller-data-transactions">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Transaksi</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col-sm-1">#</th>
                                    <th scope="col-sm-1">No. Order</th>
                                    <th scope="col-sm-2">Username</th>
                                    <th scope="col-sm-2">Handphone</th>
                                    <th scope="col-sm-2">Pesanan</th>
                                    <th scope="col-sm-2">Total</th>
                                    <th scope="col-sm-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <th scope="row">PO12345678</th>
                                    <td>

                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalTransactions">Maesaroh</a>
                                        <div class="modal fade" id="modalTransactions" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">PO12345678</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xl">

                                                                <div class="col-xl">
                                                                    <form>


                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Nama Pesanan</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="Pancake Keju" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Harga Satuan</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="10.000" disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Jumlah Pesanan</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="x2" disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Total Harga</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="20.000" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Metode Pengiriman</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="Ambil Sendiri" disabled>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Metode Pembayaran</label>
                                                                            <div class="col-sm-8">
                                                                                <input type="text" class="form-control" value="COD" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Bukti Pembayaran</label>
                                                                            <div class="col-sm-8">
                                                                                <div class="image-detail-product-big">
                                                                                    <img src="" class="rounded mx-auto d-block" width="200px" height="200px">

                                                                                </div>
                                                                            </div>
                                                                        </div>



                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Catatan</label>
                                                                            <div class="col-sm-8">
                                                                                <textarea class="form-control" style="height: 100px" disabled>Pisah Toppingnya</textarea>

                                                                            </div>
                                                                        </div>

                                                                        <div class="row mb-3">
                                                                            <label class="col-sm-4 col-form-label">Status</label>
                                                                            <div class="col-sm-8">
                                                                                <select class="form-select" aria-label="Default select example">
                                                                                    <option selected>Open this select menu</option>
                                                                                    <option value="1">Setujui</option>
                                                                                    <option value="2">Sedang Dikirim</option>
                                                                                    <option value="3">Selesai</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>






                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan</button>
                                                        <button type="button" class="btn btn-primary">Konfirmasi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Keju (2)</td>
                                    <td>Rp<span>20.000</span></td>
                                    <td><span class="badge bg-success">Disetujui</span></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th scope="row">2</th>
                                    <th scope="row">PO12345678</th>
                                    <td>
                                        <a href="">Maesaroh</a>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Madu (2) </td>
                                    <td>Rp<span>30000</span></td>
                                    <td><span class="badge bg-warning">Sedang dikirim</span></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th scope="row">3</th>
                                    <th scope="row">PO12345678</th>
                                    <td>
                                        <a href="">Maesaroh</a>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Madu (2) </td>
                                    <td>Rp<span>30000</span></td>
                                    <td><span class="badge bg-danger">Ditolak</span></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th scope="row">4</th>
                                    <th scope="row">PO12345678</th>
                                    <td>
                                        <a href="">Maesaroh</a>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Madu (2) </td>
                                    <td>Rp<span>30000</span></td>
                                    <td><span class="badge bg-warning">Sedang dikirim</span></td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <th scope="row">5</th>
                                    <th scope="row">PO12345678</th>
                                    <td>
                                        <a href="">Maesaroh</a>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Madu (2) </td>
                                    <td>Rp<span>30000</span></td>
                                    <td><span class="badge bg-secondary">Selesai</span></td>
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