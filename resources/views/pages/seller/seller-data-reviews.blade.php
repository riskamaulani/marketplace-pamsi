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
        <h1>Data Ulasan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="seller-dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Ulasan</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section data-products">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Ulasan</h5>


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
                                        <a href="">Maesaroh</a>
                                    </td>
                                    <td>08123456789</td>
                                    <td>Pancake Madu (2) Pancake Strawberry (2) Pancake Keju (3) Pancake Coklat (1) </td>
                                    <td>Rp<span>30000</span></td>
                                    <td><span class="badge bg-success">Approved</span></td>
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
                                    <td><span class="badge bg-warning">Pending</span></td>
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
                                    <td><span class="badge bg-danger">Rejected</span></td>
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
                                    <td><span class="badge bg-warning">Pending</span></td>
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
                                    <td><span class="badge bg-warning">Pending</span></td>
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