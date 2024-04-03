@extends('layouts.global-layout', [
'title' => 'Profile',
])

@section('content')
<main class="main history-transaction-buyer">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card history-transaction overflow-auto">
                    <h1 class="card-title mx-3">Profil</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 px-4 d-flex flex-column align-items-center">
                    <img src="{{ $user->foto ? 'storage/' . $user->foto : 'assets/img/no-image.jpg' }}"
                                alt="Profile" class="rounded-circle" />
                        <h1 class="card-title">{{ auth()->user()->nama }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">
                                    Profil
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
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Lengkap</div>
                                    <div class="col-lg-9 col-md-8">: {{ auth()->user()->nama }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Username</div>
                                    <div class="col-lg-9 col-md-8">
                                        : {{ auth()->user()->username }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No. Telepon</div>
                                    <div class="col-lg-9 col-md-8">: {{ auth()->user()->nomor_hp ?? '-' }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">
                                        : {{ auth()->user()->email ?? '-' }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8">
                                        : {{ auth()->user()->alamat ?? '-' }}
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <!-- Profile Edit Form -->
                                <form action="{{ route('profil.user', $user->id) }}" method="POST"
                                        enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                        @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                            Gambar Profil</label>
                                        <div class="col-md-8 col-lg-9">
                                        <div class="col-md-8 col-lg-9">
                                                <img id="imagePreviewUpdate"
                                                    src="{{ $user->foto_profil ? asset('storage/' . $user->foto_profil) : 'assets/img/no-image.jpg' }}"
                                                    alt="Image Preview" class="rounded mx-auto d-block" width="200px"
                                                    height="200px" />
                                                <div class="pt-2">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        style="display: none;" id="cancelImageUpdate"><i class="bi bi-trash"
                                                            style="color:white;"></i></button>
                                                    <input type="file" id="imageInputUpdate" name="foto"
                                                        accept="image/*" aria-label="File upload">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="namatoko" class="col-md-4 col-lg-3 col-form-label">Nama
                                            Lengkap</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="nama" type="text" class="form-control" id="fullName" placeholder="Nama Lengkap" value="{{ $user->nama }}" required  />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="tentang" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                        <div class="col-md-8 col-lg-9">
                                            <textarea name="alamat" class="form-control" id="address" style="height: 100px" placeholder="Alamat" required>{{ $user->alamat }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="pengelola" class="col-md-4 col-lg-3 col-form-label">Username</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="username" type="text" class="form-control" id="username" placeholder="Username" value="{{ $user->username }}" required   />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Telepon</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="phone" type="text" class="form-control" id="Phone" placeholder="Nomor Handphone" value="{{ $user->nomor_hp }}" required   />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="Email" placeholder="Email" value="{{ $user->email }}" required   />
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
    </div>
</main>

<script>
        var defaultImage = @php echo isset($user->foto_profil) ? json_encode('storage/'.$user->foto_profil) : json_encode('assets/img/no-image.jpg'); @endphp

        var imageInputUpdate = document.getElementById('imageInputUpdate');
        var imagePreviewUpdate = document.getElementById('imagePreviewUpdate');
        var cancelImageUpdate = document.getElementById('cancelImageUpdate');

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