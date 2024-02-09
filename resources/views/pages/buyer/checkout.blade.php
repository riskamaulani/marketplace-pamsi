@extends('layouts.global-layout', [
'title' => 'Checkout',
])

@section('content')
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
                        <table class="table datatable checkout-buyer">
                            <thead>
                                <tr class="checkout-product-subtitle">
                                    <td scope="col-sm-2 " style="font-weight :600;color:#585858">Produk</td>
                                    <td scope="col-sm-2 align-text-center" style="font-weight:600;color:#585858">Jumlah</td>
                                    <td scope="col-sm-2" style="font-weight:600;color:#585858">Harga satuan</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="#"><img src="assets/img/es mentimun.jpg" alt="" class="rounded" width="70px" height="auto"></a>
                                            </div>
                                            <div class="col-sm-9">
                                               Es mentimun
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        2
                                    </td>
                                    <td>10.000</td>

                                </tr>

                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <div class="row mb-3">

                                    <label for="catatan" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Catatan</label>
                                    <div class="col-sm-8">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" placeholder="Catatan (Opsional)" id="catatan" style="height: 100px"></textarea>
                                            <label for="catatan">Catatan (Opsional)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jenispengiriman" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Jenis Pengiriman</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example" disabled>

                                            <option value="1">Pre-order</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Metode Pengiriman</label>
                                    <div class="col-sm-8">
                                        <select class="form-select" aria-label="Default select example">

                                            <option value="1" selected>Ambil sendiri</option>
                                            <option value="2">Via Kurir (Daerah Mataram) Rp10.000</option>

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
                                            <option value="2">Transfer Bank NTB Syariah (535219875648 - Madrasah
                                                Alam Sayang Ibu)</option>
                                            <option value="3">E-Wallet DANA (0821379473628 - Madrasah Alam Sayang
                                                Ibu) </option>

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
                        <h1 class="card-title-ringkasan ">Ringkasan</h1>
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
                            <div class="col d-flex justify-content-end">Rp20.000</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Ongkos Kirim</h6>
                            </div>
                            <div class="col d-flex justify-content-end">-</div>
                        </div>

                        <hr class="line-divider">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 style="font-weight: bold;">Rp20.000</h6>
                            </div>
                        </div>
                        </hr>

                    </div>

                </div>
                <div class="card checkout overflow-auto">
                    <div class="card-body">
                        <h1 class="card-title-ringkasan ">Unggah Bukti Pembayaran</h1>
                        <div class="image-detail-product-big mb-2">
                            <img src="assets/img/bukti1.jpg" class="rounded mx-auto d-block" width="200px" height="200px">

                        </div>

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