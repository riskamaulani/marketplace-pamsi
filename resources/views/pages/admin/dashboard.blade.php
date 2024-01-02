@extends('layouts.panel-layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">
                <!-- Top side columns -->

                <!-- Sales Card -->
                <div class="col-sm-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Penjualan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $penjualan }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-sm-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Pendapatan</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp. <span>{{ number_format($pendapatan, 0) }}</span></h6>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-sm-4">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Pembeli</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $pembeli }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
            </div>

            <!-- Products Card -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="card info-card products-card">
                        <div class="card-body">
                            <h5 class="card-title">Produk</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-bag"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $produk }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Products Card -->

                <!-- Accounts Card -->
                <div class="col-sm-4">
                    <div class="card info-card accounts-card">
                        <div class="card-body">
                            <h5 class="card-title">Pengguna</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $pengguna }}</h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- End Accounts Card -->

                <!-- Sellers Card -->
                <div class="col-sm-4">
                    <div class="card info-card sellers-card">
                        <div class="card-body">
                            <h5 class="card-title">Toko</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shop"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $penjual }}</h6>


                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- End Customers Card -->
            </div>

            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-8">
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Laporan Pendapatan</h5>
                                <!-- Line Chart -->
                                <div id="reportsChartPendapatan"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartPendapatan"), {
                                            series: [{
                                                name: 'Pendapatan',
                                                data: [
                                                    <?php
                                                    foreach ($chart_pendapatan as $cpend) {
                                                        echo $cpend->jumlah_pendapatan . ',';
                                                    }
                                                    ?>
                                                ],
                                            }, ],
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
                                                type: 'text',
                                                categories: [
                                                    <?php
                                                    foreach ($chart_pendapatan as $cpend) {
                                                        echo '"' . $cpend->tanggal . '"' . ',';
                                                    }
                                                    ?>
                                                ]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy'
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
                                <h5 class="card-title">Laporan Penjualan</h5>

                                <!-- Line Chart -->
                                <div id="reportsChartPenjualan"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChartPenjualan"), {
                                            series: [{
                                                name: 'Penjualan',
                                                data: [
                                                    <?php
                                                    foreach ($chart_penjualan as $cpp) {
                                                        echo $cpp->jumlah . ',';
                                                    }
                                                    ?>
                                                ],
                                            }, {
                                                name: 'Pembeli',
                                                data: [
                                                    <?php
                                                    foreach ($chart_penjualan as $cpp3) {
                                                        echo $cpp3->jm_pembeli . ',';
                                                    }
                                                    ?>
                                                ]
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
                                            colors: ['#4154f1', '#2eca6a', '#ff771d'],
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
                                                type: 'text',
                                                categories: [
                                                    <?php
                                                    foreach ($chart_penjualan as $cpp2) {
                                                        echo '"' . $cpp2->tanggal . '"' . ',';
                                                    }
                                                    ?>
                                                ]
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy'
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
                                        @foreach ($terbaru as $tbr)
                                            <tr>
                                                <th scope="row">

                                                    <a href="" onclick="" data-bs-toggle="modal"
                                                        data-bs-target="#modalTransactions">{{ $tbr->id_transaksi }}</a>

                                                </th>
                                                <td>{{ $tbr->pembeli->nama_pembeli }}</td>
                                                <td>{{ $tbr->produk->nama_produk }}
                                                    <span>({{ $tbr->jumlah_produk }})</span>
                                                </td>
                                                <td>Rp. <span>{{ number_format($tbr->total_pembayaran, 0) }}</span></td>
                                                @php
                                                    $isDisetujui = false;
                                                    $isSedangDikirim = false;
                                                    $isDitolak = false;
                                                    $isSelesai = false;

                                                    switch ($tbr->status_pesanan) {
                                                        case 'SP001':
                                                            $isDisetujui = true;
                                                            break;
                                                        case 'SP002':
                                                            $isSedangDikirim = true;
                                                            break;
                                                        case 'SP003':
                                                            $isDitolak = true;
                                                            break;
                                                        default:
                                                            $isSelesai = true;
                                                    }

                                                @endphp
                                                <td>

                                                    <span @class([
                                                        'badge ',
                                                        'bg-success' => $isDisetujui,
                                                        'bg-warning' => $isSedangDikirim,
                                                        'bg-danger' => $isDitolak,
                                                        'bg-secondary' => $isSelesai,
                                                    ])>
                                                        {{ $tbr->status->status_pesanan }}</span>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->
                </div>
                <!-- End Left side columns -->

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
                                        @foreach ($teratas as $ts)
                                            <tr>
                                                <th scope="row"><a href="#"><img
                                                            src="assets/img/{{ $ts->gambar_produk }}" alt=""></a>
                                                </th>
                                                <td>

                                                    <a href=""
                                                        onclick="edit_data('{{ $ts->id_produk }}','{{ $ts->harga_produk }}', '{{ $ts->nama_produk }}', 'assets/img/{{ $ts->gambar_produk }}', '{{ $ts->total }}',)"
                                                        class="text-primary fw-bold" data-bs-toggle="modal"
                                                        data-bs-target="#modalTopSelling">{{ $ts->nama_produk }}</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="modal fade" id="modalTopSelling" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title fw-bold" id="name_title">nama</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl">
                                                        <div class="image-detail-product-big">
                                                            <img id="gambar_produk" class="rounded mx-auto d-block"
                                                                width="200px" height="200px">

                                                        </div>
                                                        <div class="col-xl">
                                                            <form>
                                                                <!-- <div class="row mb-3">
                                                                                <label for="profileImage" class="col-sm-4 col-form-label">Gambar Profil</label>
                                                                                <div class="col-sm-8">

                                                                                    <div class="pt-2">
                                                                                        <a href="#" class="btn btn-sm btn-primary" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                                                        <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div> -->

                                                                <div class="row mb-3">
                                                                    <label for="noproduct"
                                                                        class="col-sm-4 col-form-label">No. Produk</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="noproduct" type="text"
                                                                            class="form-control" id="noproduct" />
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="name"
                                                                        class="col-sm-4 col-form-label">Nama Produk</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="name" type="text"
                                                                            class="form-control" id="name"
                                                                            value="nama" />
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="price"
                                                                        class="col-sm-4 col-form-label">Harga</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="price" type="text"
                                                                            class="form-control" id="harga_produk"
                                                                            value="harga" />
                                                                    </div>
                                                                </div>


                                                                <div class="row mb-3">
                                                                    <label for="stock"
                                                                        class="col-sm-4 col-form-label">Terjual</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="stock" type="text"
                                                                            class="form-control" id="terjual"
                                                                            value="terjual" />
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

                                <div class="modal fade" id="modalTransactions" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">PO12345678</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl">

                                                        <div class="col-xl">
                                                            <form>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Nama
                                                                        Pesanan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            value="Pancake Keju" disabled>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Harga
                                                                        Satuan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            value="10.000" disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Jumlah
                                                                        Pesanan</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            value="x2" disabled>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Total
                                                                        Harga</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control"
                                                                            value="20.000" disabled>
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
                                                                        <select class="form-select"
                                                                            aria-label="Default select example">
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
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batalkan</button>
                                                <button type="button" class="btn btn-primary">Konfirmasi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div><!-- End Top Selling -->
                </div><!-- End Right side columns -->
            </div>
            </div>

            <script>
                function edit_data(id, harga, nama, gambar, terjual) {
                    document.getElementById("name_title").innerHTML = nama;
                    document.getElementById("noproduct").value = id;
                    document.getElementById("name").value = nama;
                    document.getElementById("gambar_produk").src = gambar;
                    document.getElementById("harga_produk").value = harga;
                    document.getElementById("terjual").value = terjual;
                }
            </script>
        </section>
    </main><!-- End #main -->
@endsection
