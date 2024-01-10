@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main data-users">

    <div class="pagetitle">
        <h1>Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Pengguna</li>
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
                                <h5 class="card-title">Data Pengguna</h5>
                            </div>
                            <!-- <div class="col-3 d-flex align-items-center justify-content-end">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalAddNewSeller"><i class="bi bi-plus"></i>Tambah
                                        Pengguna</button>

                                    <div class="modal fade" id="modalAddNewSeller" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Pengguna</h5>
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
                                                                            Lengkap</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Username</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-3">
                                                                        <label
                                                                            class="col-sm-4 col-form-label">Alamat</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>


                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">No.
                                                                            Telepon</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label class="col-sm-4 col-form-label">Email</label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control"
                                                                                value="">
                                                                        </div>
                                                                    </div>



                                                                    <div class="row mb-3">
                                                                        <label for="newPassword"
                                                                            class="col-sm-4  col-form-label">Password
                                                                            Baru</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="newpassword" type="password"
                                                                                class="form-control" id="newPassword">
                                                                        </div>
                                                                    </div>

                                                                    <div class="row mb-3">
                                                                        <label for="renewPassword"
                                                                            class="col-sm-4 col-form-label">Konfirmasi
                                                                            Password Baru</label>
                                                                        <div class="col-sm-8">
                                                                            <input name="renewpassword" type="password"
                                                                                class="form-control" id="renewPassword">
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
                                                    <button type="button" class="btn btn-primary">Tambah Pengguna</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col-sm-1">#</th>
                                        <th scope="col-sm-3">Nama Pengguna</th>
                                        <th scope="col-sm-3">Username</th>
                                        <th scope="col-sm-3">No. Handphone</th>
                                        <th scope="col-sm-2">Email</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <a href="" onclick="edit_data_user(
                                            '{{ $user->nama }}',
                                            '{{ $user->username }}',
                                            '{{ $user->alamat }}',
                                            '{{ $user->nomor_hp }}',
                                            '{{ $user->email }}'
                                        )" data-bs-toggle="modal" data-bs-target="#modalUser">{{ $user->nama }}</a>
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->nomor_hp ?? '-' }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                            <div class="modal fade" id="modalUser" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="name-title">
                                                <Title></Title>
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xl">

                                                    <div class="col-xl">
                                                        <form>
                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Nama Lengkap</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="namalengkap" id="namalengkap" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Username</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="username" id="username" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Alamat</label>
                                                                <div class="col-sm-8">
                                                                    <textarea class="form-control" style="height: 100px" id="alamatuser" disabled>alamatuser</textarea>

                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">No. Telepon</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="nomor_telepon_pembeli" id="nomor_telepon_pembeli" disabled>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-3">
                                                                <label class="col-sm-4 col-form-label">Email</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" value="email_pembeli" id="email_pembeli" disabled>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
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
                function edit_data_user(nama, username, alamat, nomortelepon, email) {
                    document.getElementById("name-title").innerHTML = nama;
                    document.getElementById("namalengkap").value = nama;
                    document.getElementById("username").value = username;
                    document.getElementById("alamatuser").innerHTML = alamat;
                    document.getElementById("nomor_telepon_pembeli").value = nomortelepon;
                    document.getElementById("email_pembeli").value = email;
                }
            </script>
    </section>
</main><!-- End #main -->
@endsection