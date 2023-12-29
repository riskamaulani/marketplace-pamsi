@extends('Admin.layout_admin')
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
        <h1>Data Penjual</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Data Penjual</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section data-sellers">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-9 ">
                                <h5 class="card-title">Data Penjual</h5>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewSeller"><i class="bi bi-plus"></i>Tambah Penjual</button>

                                <div class="modal fade" id="modalAddNewSeller" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Penjual</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl">

                                                        <div class="col-xl">
                                                            <form>


                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Nama Toko</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Tentang</label>
                                                                    <div class="col-sm-8">
                                                                        <textarea class="form-control" style="height: 100px">
                                                                            </textarea>

                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Pengelola</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Jumlah Produk</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <div class="row mb-3">
                                                                        <legend class="col-form-label col-sm-4 pt-0">
                                                                            Jadwal Buka
                                                                        </legend>
                                                                        <div class="col-sm-8 px-4">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck1" />
                                                                                <label class="form-check-label" for="gridCheck1">
                                                                                    Senin
                                                                                </label>
                                                                            </div>

                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Selasa
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Rabu
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Kamis
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Jumat
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Sabtu
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                                <label class="form-check-label" for="gridCheck2">
                                                                                    Minggu
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">No. Telepon</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Email</label>
                                                                    <div class="col-sm-8">
                                                                        <input type="text" class="form-control" value="">
                                                                    </div>
                                                                </div>





                                                                <div class="row mb-3">
                                                                    <label class="col-sm-4 col-form-label">Status</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="form-select" aria-label="Default select example">
                                                                            <option selected>Open this select menu</option>
                                                                            <option value="1">Buka</option>
                                                                            <option value="2">Tutup</option>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="newPassword" class="col-sm-4  col-form-label">Password Baru</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="renewPassword" class="col-sm-4 col-form-label">Konfirmasi Password Baru</label>
                                                                    <div class="col-sm-8">
                                                                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                                                                    </div>
                                                                </div>






                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Tambah Penjual</button>
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
                                    <th scope="col-sm-2">Nama Toko</th>
                                    <th scope="col-sm-2">Handphone</th>
                                    <th scope="col-sm-2">Produk</th>
                                    <th scope="col-sm-3">Jadwal</th>
                                    <th scope="col-sm-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjual as $jual)

                                <tr>
                                    <th scope="row">1</th>
                                    <td>

                                        <a href="" onclick="edit_data_seller(
                                           '{{$jual->nama_toko}}',
                                           'assets/img/{{$jual->gambar_toko}}',
                                           '{{$jual->deskripsi_toko}}',
                                           '{{$jual->pengelola}}', 
                                           '{{$jual->jumlah_produk->jumlah_produk}}',
                                           '{{$jual->nomor_telepon_penjual}}',
                                           '{{$jual->email_toko}}'
                                        )" data-bs-toggle="modal" data-bs-target="#modalSellers">{{$jual->nama_toko}}</a>

                                    </td>
                                    <td>{{ $jual->nomor_telepon_penjual }}</td>
                                    <td>{{ $jual->jumlah_produk->jumlah_produk }}</td>
                                    <td>Senin | Rabu | Jumat</td>
                                    @php
                                    $isBuka = false;
                                    $isTutup = false;


                                    switch($jual->id_status_toko){
                                    case 'ST001' : $isBuka = true; break;
                                    default : $isTutup = true;

                                    }

                                    @endphp
                                    <td><span @class([ 'badge ' , 'bg-success'=> $isBuka, 'bg-secondary'=> $isTutup
                                            ])>
                                            {{ $jual->status_toko->status }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        <div class="modal fade" id="modalSellers" tabindex="-1">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="name_title">namatoko</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-xl">

                                                <div class="col-xl">
                                                    <form>
                                                        <div class="card">
                                                            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                                                <img id="gambar_toko" alt="Profile" class="rounded py-auto px-auto" width="50%" height="auto">



                                                            </div>
                                                        </div>


                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Nama Toko</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" id="nama_toko" value="Fluffy Pancake" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Tentang</label>
                                                            <div class="col-sm-8">
                                                                <textarea class="form-control" style="height: 100px" id="tentang_toko" disabled>
                                                                tentang
                                                                            </textarea>

                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Pengelola</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="pengelola" id="pengelola" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Jumlah Produk</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="jumlah_produk" id="jumlah_produk" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <div class="row mb-3">
                                                                <legend class="col-form-label col-sm-4 pt-0">
                                                                    Jadwal Buka
                                                                </legend>
                                                                <div class="col-sm-8 px-4">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck1" checked />
                                                                        <label class="form-check-label" for="gridCheck1">
                                                                            Senin
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Selasa
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" checked />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Rabu
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Kamis
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" checked />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Jumat
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Sabtu
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" id="gridCheck2" />
                                                                        <label class="form-check-label" for="gridCheck2">
                                                                            Minggu
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">No. Telepon</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="nomor_telepon_penjual" id="nomor_telepon_penjual" disabled>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Email</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control" value="email_penjual" id="email_penjual" disabled>
                                                            </div>
                                                        </div>



                                                        <div class="row mb-3">
                                                            <label class="col-sm-4 col-form-label">Status</label>
                                                            <div class="col-sm-8">
                                                                <select class="form-select" aria-label="Default select example">
                                                                    <option selected>Open this select menu</option>
                                                                    <option value="1">Buka</option>
                                                                    <option value="2">Tutup</option>

                                                                </select>
                                                            </div>
                                                        </div>






                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hapus Penjual</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <script>
            function edit_data_seller(namatoko, gambar, tentangtoko, pengelola, jumlahproduk, telepon, email_penjual) {
                document.getElementById("name_title").innerHTML = namatoko;
                document.getElementById("gambar_toko").src = gambar;
                document.getElementById("nama_toko").value = namatoko;
                document.getElementById("tentang_toko").value = tentangtoko;
                document.getElementById("pengelola").value = pengelola;
                document.getElementById("jumlah_produk").value = jumlahproduk;
                document.getElementById("nomor_telepon_penjual").value = telepon;
                document.getElementById("email_penjual").value = email_penjual;
            }
        </script>
    </section>

</main><!-- End #main -->



@endsection