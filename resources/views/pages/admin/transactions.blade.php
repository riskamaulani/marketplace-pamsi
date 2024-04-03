@extends('layouts.panel-layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Transaksi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Data Transaksi</li>

                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section admin-data-transactions">
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

                                    @foreach ($transaksi as $trx)
                                        <tr>
                                            <th scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <th scope="row">{{ $trx->id }}</th>
                                            <td>

                                                {{-- <a href=""
                                                    onclick="edit_data_transaksi(
                                            '{{ $trans->pembeli->username_pembeli }}',
                                            '{{ $trans->pembeli->nomor_telepon_pembeli }}',
                                            '{{ $trans->id_transaksi }}',
                                            '{{ $trans->produk->nama_produk }}',
                                            '{{ $trans->produk->harga_produk }}',
                                            '{{ $trans->jumlah_produk }}',
                                            '{{ $trans->pengiriman->harga }}',
                                            '{{ $trans->total_pembayaran }}',
                                            '{{ $trans->catatan_pesanan }}',
                                            '{{ $trans->pengiriman->metode_pengiriman }}',
                                            '{{ $trans->alamat_pesanan }}',
                                            'assets/img/{{ $trans->bukti_pembayaran }}',
                                            )"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#modalTransactions">{{ $trans->pembeli->nama_pembeli }}</a> --}}
                                                {{ $trx->user->username }}

                                            </td>
                                            <td>{{ $trx->user->nomor_hp }}</td>
                                            <td>{{ $trx->produk->nama_produk }}<span>({{ $trans->jumlah_produk }})</span>
                                            </td>
                                            <td>Rp. <span>{{ number_format($trans->total_pembayaran, 0) }}</span></td>
                                            @php
                                                $isDisetujui = false;
                                                $isSedangDikirim = false;
                                                $isDitolak = false;
                                                $isSelesai = false;

                                                switch ($trans->status_pesanan) {
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
                                            <td><span @class([
                                                'badge ',
                                                'bg-success' => $isDisetujui,
                                                'bg-warning' => $isSedangDikirim,
                                                'bg-danger' => $isDitolak,
                                                'bg-secondary' => $isSelesai,
                                            ])>
                                                    {{ $trans->status->status_pesanan }}</span></td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                            <!-- End Table with stripped rows -->
                            <div class="modal fade" id="modalTransactions" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="name_title">idtransaksi</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl">

                                                    <div class="col-xl">
                                                        <form>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Username
                                                                    Pembeli</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="namapembeli" value="namapembeli" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Nomor
                                                                    Handphone</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="nomorhp" value="nomorhp" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Nama Pesanan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="namapesanan" value="namapesanan" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Harga Satuan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="harga_produk" value="harga_produk" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Jumlah
                                                                    Pesanan</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="jumlah_pesanan" value="jumlah_pesanan" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Harga
                                                                    Pengiriman</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="harga_pengiriman" value="harga_pengiriman"
                                                                        disabled>
                                                                </div>
                                                            </div>



                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Total Harga</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="total_pembayaran" value="total_pembayaran"
                                                                        disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Catatan</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" style="height: 100px" id="catatan_pesanan" disabled>Pisah Toppingnya</textarea>

                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Metode
                                                                    Pengiriman</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="metode_pengiriman" value="metode_pengiriman"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control"
                                                                        id="alamat_pesanan" value="alamat_pesanan"
                                                                        disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Bukti
                                                                    Pembayaran</label>
                                                                <div class="col-sm-8">
                                                                    <img id="bukti_pembayaran" alt="Profile"
                                                                        class="rounded py-auto px-auto"
                                                                        style=" width: 100%; height:auto" />

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
                                                                        <option value="3">Ditolak</option>
                                                                        <option value="4">Selesai</option>
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
                                                data-bs-dismiss="modal">Hapus Pesanan</button>
                                            <button type="button" class="btn btn-primary">Konfirmasi</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <script>
                function edit_data_transaksi(namapembeli, nomorhp, id, nama, harga, jumlah, hargapengiriman, total, catatan, metode,
                    alamat, bukti) {
                    document.getElementById("namapembeli").value = namapembeli;
                    document.getElementById("nomorhp").value = nomorhp;
                    document.getElementById("name_title").innerHTML = id;
                    document.getElementById("namapesanan").value = nama;
                    document.getElementById("harga_produk").value = harga;
                    document.getElementById("jumlah_pesanan").value = jumlah;
                    document.getElementById("harga_pengiriman").value = hargapengiriman;
                    document.getElementById("total_pembayaran").value = total;
                    document.getElementById("catatan_pesanan").innerHTML = catatan;
                    document.getElementById("metode_pengiriman").value = metode;
                    document.getElementById("alamat_pesanan").value = alamat;
                    document.getElementById("bukti_pembayaran").src = bukti;

                }
            </script>
        </section>

    </main><!-- End #main -->
@endsection
