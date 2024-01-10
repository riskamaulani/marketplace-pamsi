@extends('layouts.auth-layout', [
'title' => 'Register',
])

@section('content')
<div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-2">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-4 pb-1">
                                <div class="d-flex justify-content-center ">
                                    <img src="assets/img/pamsi.jpeg" alt="pamsi" style="width:4rem;height:auto;">
                                </div>
                                <h6 class="card-title text-center pb-0 fs-5">Buat Akun</h6>
                                <!-- <p class="text-center small">Enter your personal details to create account</p> -->
                            </div>

                            <form action="{{ route('register') }}" method="post" class="row g-3 needs-validation" novalidate>
                                @csrf

                                <div class="col-12">
                                    <label for="yourName" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="yourName" required>
                                    <div class="invalid-feedback">Masukkan nama lengkap</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourEmail" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                                    <div class="invalid-feedback">Masukkan alamat email</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourHp" class="form-label">Nomor Handphone</label>
                                    <input type="hp" name="hp" class="form-control" id="yourHp" required>
                                    <div class="invalid-feedback">Masukkan nomor handphone</div>
                                </div>

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Username</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                                        <div class="invalid-feedback">Masukkan username.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                                    <div class="invalid-feedback">Masukkan password</div>
                                </div>


                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Buat Akun Sekarang</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0">Sudah Punya Akun? <a href="{{ route('loginpage') }}" style="font-weight:bold;">Log in</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection