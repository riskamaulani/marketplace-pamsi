@extends('layouts.panel-layout')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Users</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="assets/img/pamsi3.png" alt="Profile" class="rounded-circle">
                            <h2>Admin Marketplace</h2>


                        </div>
                    </div>

                </div>

                {{-- @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif --}}

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">




                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Ubah Password</button>
                                </li>

                            </ul>


                            <div class="tab-pane fade show active profile-change-password pt-3"
                                id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('change_password') }}" method="POST" autocomplete="off">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password
                                            Sekarang</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="current_password" type="password" class="form-control"
                                                id="current_password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password
                                            Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_password" type="password" class="form-control"
                                                id="new_password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="new_confirm_password"
                                            class="col-md-4 col-lg-3 col-form-label">Konfirmasi
                                            Password Baru</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="new_confirm_password" type="password" class="form-control"
                                                id="new_confirm_password">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Simpan Password</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
            </div>
        </section>

    </main><!-- End #main -->
@endsection
