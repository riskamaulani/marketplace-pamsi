@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Profil Toko</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item">Users</li>
                <li class="breadcrumb-item active">Profil Toko</li>
            </ol>
        </nav>
    </div>
    <!-- End Page Title -->

    <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="assets/img/no-image.jpg" alt="Profile" class="rounded-circle" />
                        <h2>{{ $toko->nama }}</h2>
                    </div>
                    <span class="badge bg-success">Buka</span>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    Ringkasan
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                    Sunting Profil
                                </button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                    Ubah Password
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">Tentang</h5>
                                <p class="small fst-italic" id="toko_tentang">
                                    {{ $toko->deskripsi ?? '-' }}
                                </p>

                                <h5 class="card-title">Profil Toko</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Toko</div>
                                    <div class="col-lg-9 col-md-8" id="toko_nama">{{ $toko->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Pengelola</div>
                                    <div class="col-lg-9 col-md-8" id="toko_pengelola">
                                        {{--@forelse ($toko->pengelola as $item)
                                        {{ $item }}
                                        @empty
                                        -
                                        @endforelse--}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No. Telepon</div>
                                    <div class="col-lg-9 col-md-8" id="toko_telepon">{{ auth()->user()->nomor_hp ?? '-' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8" id="toko_email">
                                        {{ auth()->user()->email }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jadwal Buka</div>
                                    <div class="col-lg-9 col-md-8" id="toko_buka">
                                        {{ auth()->user()->buka }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('profil.toko') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImageUpdate" class="col-md-4 col-lg-3 col-form-label">
                                            Gambar Profil
                                        </label>
                                        <div class="col-md-8 col-lg-9">
                                            <img id="imagePreviewUpdate" src="assets/img/no-image.jpg" alt="Image Preview" class="rounded mx-auto d-block" width="200px" height="200px" />
                                            <div class="pt-2">
                                                <button type="button" class="btn btn-danger btn-sm" style="display: none;" id="cancelImageUpdate"><i class="bi bi-trash" style="color:white;"></i></button>
                                                <input type="file" id="imageInputUpdate" name="foto" accept="image/*" aria-label="File upload" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="namatoko" class="col-md-4 col-lg-3 col-form-label">Nama Toko</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" placeholder="Nama Toko" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tentang" class="col-md-4 col-lg-3 col-form-label">Tentang</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="deskripsi" class="form-control" style="height: 100px" placeholder="Tentang" required></textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="pengelola" class="col-md-4 col-lg-3 col-form-label">Pengelola</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="company" type="text" class="form-control" placeholder="Nama Pengelola" />
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-form-label col-md-4 col-lg-3">
                                            Jadwal Buka
                                        </label>
                                        <div class="col-md-8 col-lg-9">
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



                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">No. Handphone</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" placeholder="Nomor Handphone" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" placeholder="Email" required />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="StatusToko" class="col-sm-3 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="status" class="form-select" aria-label="Pilih Status Toko">
                                                @foreach (\App\Enums\TokoStatus::cases() as $status)
                                                <option value="{{ $status->value }}">
                                                    {{ $status->getLabelText() }}
                                                </option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                                <!-- End Profile Edit Form -->
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <!-- Change Password Form -->
                                @include('components.change-password-form')
                                <!-- End Change Password Form -->
                            </div>
                        </div>
                        <!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    var imageInputUpdate = document.getElementById('imageInputUpdate');
    var imagePreviewUpdate = document.getElementById('imagePreviewUpdate');
    var cancelImageUpdate = document.getElementById('cancelImageUpdate');
    var defaultImage = "assets/img/pamsi.jpeg"

    imageInputUpdate.addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            imagePreviewUpdate.src = reader.result;
            cancelImageUpdate.style.display = 'inline'; // Show cancel button
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    cancelImageUpdate.addEventListener('click', function() {
        imagePreviewUpdate.src = defaultImage;
        imageInputUpdate.value = ''; // Clear image input
        cancelImageUpdate.style.display = 'none'; // Hide cancel button
    });
</script>
@endsection