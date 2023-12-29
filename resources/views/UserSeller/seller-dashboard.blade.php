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



<main id="main" class="main seller-dashboard">

    <div class="pagetitle">
        <h1>Dashboard untuk Penjual</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Penjualan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card revenue-card">


                            <div class="card-body">
                                <h5 class="card-title">Pendapatan</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>11111</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <!-- Customers Card -->
                    <div class="col-xxl-4 col-xl-6">

                        <div class="card info-card customers-card">

                            <div class="card-body">
                                <h5 class="card-title">Pembeli</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->

                    <!-- Products Card -->
                    <div class="col-xxl-4 col-xl-6">

                        <div class="card info-card products-card">



                            <div class="card-body">
                                <h5 class="card-title">Produk</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bag"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>1244</h6>


                                    </div>
                                </div>

                            </div>
                        </div>

                    </div><!-- End Customers Card -->
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title"> Laporan Pendapatan</h5>

                                <!-- Line Chart -->
                                <div id="reportsChartPendapatan"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartPendapatan"), {
                                            series: [{
                                                name: 'Pendapatan',
                                                data: [15, 11, 32, 18, 9, 24, 11]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#ff771d'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->


                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title"> Laporan Penjualan</h5>

                                <!-- Line Chart -->
                                <div id="reportsChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'Penjualan',
                                                data: [31, 40, 28, 51, 42, 82, 56],
                                            }, {
                                                name: 'Pembeli',
                                                data: [11, 32, 45, 32, 34, 52, 41]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#4154f1', '#2eca6a', ],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">
                                <h5 class="card-title">Penjualan Terbaru</h5>

                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Pembeli</th>
                                            <th scope="col">Produk</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">

                                                <a href="" data-bs-toggle="modal" data-bs-target="#modalTransactions">PO123456789</a>
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
                                            </th>
                                            <td>Maesaroh</td>
                                            <td>Pancake Keju <span>(2)</span></td>
                                            <td>20.000</td>
                                            <td><span class="badge bg-success">Disetujui</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">PO123456789</a></th>
                                            <td>Maesaroh</td>
                                            <td>Pancake Keju <span>(2)</span></td>
                                            <td>20.000</td>
                                            <td><span class="badge bg-warning">Sedang Dikirim</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">PO123456789</a></th>
                                            <td>Maesaroh</td>
                                            <td>Pancake Keju <span>(2)</span></td>
                                            <td>20.000</td>
                                            <td><span class="badge bg-secondary">Selesai</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">PO123456789</a></th>
                                            <td>Maesaroh</td>
                                            <td>Pancake Keju <span>(2)</span></td>
                                            <td>20.000</td>
                                            <td><span class="badge bg-danger">Ditolak</span></td>
                                        </tr>
                                        <tr>
                                            <th scope="row"><a href="#">PO123456789</a></th>
                                            <td>Maesaroh</td>
                                            <td>Pancake Keju <span>(2)</span></td>
                                            <td>20.000</td>
                                            <td><span class="badge bg-success">Disetujui</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->


                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">


                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Penjualan Teratas</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Produk</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row"><a href="#"><img class="img-top-selling" src="assets/img/pancake.jpg" alt=""></a></th>
                                        <td>

                                            <a href="" class="text-primary fw-bold" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">Pancake Keju</a>
                                            <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bold">Pancake Keju</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-xl">
                                                                    <div class="image-detail-product-big">
                                                                        <img src="assets/img/pancake.jpg" class="rounded mx-auto d-block" width="200px" height="200px">

                                                                    </div>
                                                                    <div class="col-xl">
                                                                        <form>
                                                                            <div class="row mb-3">
                                                                                <label for="profileImage" class="col-sm-4 col-form-label">Gambar Profil</label>
                                                                                <div class="col-sm-8">

                                                                                    <div class="pt-2">
                                                                                        <a href="#" class="btn btn-sm btn-primary" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                                                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="noproduct" class="col-sm-4 col-form-label">No. Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="noproduct" type="text" class="form-control" id="noproduct" value="PAN1" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="name" class="col-sm-4 col-form-label">Nama Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="name" type="text" class="form-control" id="name" value="Pancake Keju" />
                                                                                </div>
                                                                            </div>

                                                                            <div class="row mb-3">
                                                                                <label for="price" class="col-sm-4 col-form-label">Harga</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="price" type="text" class="form-control" id="price" value="10.000" />
                                                                                </div>
                                                                            </div>


                                                                            <div class="row mb-3">
                                                                                <label for="stock" class="col-sm-4 col-form-label">Stok</label>
                                                                                <div class="col-sm-8">
                                                                                    <input name="stock" type="text" class="form-control" id="stock" value="-" />
                                                                                </div>
                                                                            </div>



                                                                            <div class="row mb-3">
                                                                                <label for="statusproduct" class="col-sm-4 col-form-label">Status Produk</label>
                                                                                <div class="col-sm-8">
                                                                                    <select class="form-select" aria-label="Default select example">
                                                                                        <option selected>Open this select menu</option>
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
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                            <button type="button" class="btn btn-primary">Simpan Perubahan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img class="img-top-selling" src="assets/img/pancake1.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Pancake Blueberry</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img class="img-top-selling" src="assets/img/pancake2.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Pancake Strawberry</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img class="img-top-selling" src="assets/img/pancake3.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Pancake Coklat</a></td>

                                    </tr>
                                    <tr>
                                        <th scope="row"><a href="#"><img class="img-top-selling" src="assets/img/pancake.jpg" alt=""></a></th>
                                        <td><a href="#" class="text-primary fw-bold">Pancake Madu</a></td>

                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Top Selling -->





            </div><!-- End Right side columns -->

        </div>
    </section>

</main><!-- End #main -->





@endsection