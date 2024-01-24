@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Produk</li>

            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section seller-data-products">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9 ">
                                <h5 class="card-title">Data Produk</h5>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewProduct">
                                    <i class="bi bi-plus"></i>Tambah Produk
                                </button>
                            </div>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col-sm-1">#</th>
                                    <th scope="col-sm-1">No. Produk</th>
                                    <th scope="col-sm-2">Foto</th>
                                    <th scope="col-sm-2">Nama Produk</th>
                                    <th scope="col-sm-2">Harga</th>
                                    <th scope="col-sm-2">Terjual</th>
                                    <th scope="col-sm-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produks as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td scope="row">{{ $item->id }}</td>
                                    <td>
                                        <a href="{{ 'storage/'.$item->gambar }}" target="blank"><img src="{{  'storage/'.$item->gambar }}" alt="" class="rounded" width="100px" height="auto"></a>
                                    </td>
                                    <th><a href="" onclick="updateProduk('{{ 'storage/'.$item->gambar }}',
                                                     '{{ route('produk.update', ['produk' => $item->id]) }}', 
                                                     '{{ $item->nama }}', '{{ $item->harga }}',
                                                      '{{ $item->kategori_id }}', 
                                                      '{{ $item->order_type }}', 
                                                      '{{ $item->deskripsi }}', 
                                                      '{{ $item->status->value }}')" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">{{ $item->nama }}</a></th>

                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->terjual }}</td>
                                    <td><span @class([ 'badge' , 'bg-success'=> $item->status->isTersedia(),
                                            'bg-danger' => $item->status->isHabis(),
                                            ])>{{ $item->status->getLabelText() }}</span>
                                    </td>
                                </tr>
                                @empty
                                Tidak ada produk
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main><!-- End #main -->

{{-- add modal --}}
<div class="modal fade" id="modalAddNewProduct" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl">
                        <div class="image-detail-product-big">
                            <img id="imagePreview" src="assets/img/no-image.jpg" alt="Image Preview" class="rounded mx-auto d-block" width="200px" height="200px" />
                        </div>
                        <div class="col-xl">

                            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-sm-4 col-form-label">
                                        Gambar Profil</label>
                                    <div class="col-sm-8">
                                        <div class="pt-2 d-flex">
                                            <button type="button" class="btn btn-danger btn-sm" style="display: none;" id="cancelImage"><i class="bi bi-trash" style="color:white;"></i></button>
                                            <input type="file" id="imageInput" name="gambar" accept="image/*" aria-label="File upload" required>
                                            {{-- <div>
                                                    <i class="bi bi-upload "
                                                        style="color:white;"></i>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-4 col-form-label">
                                        Nama Produk
                                    </label>
                                    <div class="col-sm-8">
                                        <input name="nama" type="text" class="form-control" placeholder="Nama Produk" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input name="harga" type="number" min="0" class="form-control" placeholder="0" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-sm-4 col-form-label"> Kategori
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <select name="kategori_id" class="form-select" aria-label="Default select example">
                                            <option disabled>Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label">Jenis
                                        Pemesanan</label>
                                    <div class="col-sm-8">
                                        <select name="order_type" class="form-select" aria-label="Default select example">
                                            <option disabled>Pilih Jenis Pemesanan
                                            </option>
                                            @foreach (\App\Enums\ProdukOrderType::cases() as $status)
                                            <option value="{{ $status->value }}">
                                                {{ $status->getLabelText() }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="deskripsi" class="col-sm-4 col-form-label">Detail
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <textarea name="deskripsi" class="form-control" style="height: 100px" placeholder="Detail" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-sm-4 col-form-label">Status
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <select name="status" class="form-select" aria-label="Pilih Status">
                                            @foreach (\App\Enums\ProdukStatus::cases() as $status)
                                            <option value="{{ $status->value }}">
                                                {{ $status->getLabelText() }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end add modal --}}


{{-- edit modal --}}
<div class="modal fade" id="modalDialogScrollable" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="produk_title">Nama Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl">
                        <div class="image-detail-product-big">
                            <img id="imagePreviewUpdate" src="" alt="Image Preview" class="rounded mx-auto d-block" width="200px" height="200px" />
                        </div>

                        <div class="col-xl">
                            <form id="produk_update_form" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('put')

                                <input type="hidden" name="id" id="produk_id">

                                <div class="row mb-3">
                                    <label for="profileImage" class="col-sm-4 col-form-label">Gambar
                                        Profil</label>
                                    <div class="col-sm-8">
                                        <div class="pt-2 d-flex">
                                            <button type="button" class="btn btn-danger btn-sm" style="display: none;" id="cancelImageUpdate"><i class="bi bi-trash" style="color:white;"></i></button>
                                            <input type="file" id="imageInputUpdate" name="gambar" accept="image/*" aria-label="File upload">
                                            {{-- <div>
                                                    <i class="bi bi-upload "
                                                        style="color:white;"></i>
                                                </div> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-4 col-form-label">Nama
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Produk" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                                    <div class="col-sm-8">
                                        <input name="harga" type="number" min="0" class="form-control" id="harga" placeholder="0" required />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-sm-4 col-form-label"> Kategori
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <select name="kategori_id" class="form-select" aria-label="Default select example">
                                            <option disabled>Pilih Kategori</option>
                                            @foreach ($categories as $item)
                                            <option id="kategori-{{ $item->id }}" value="{{ $item->id }}">
                                                {{ $item->nama }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label">Jenis
                                        Pemesanan</label>
                                    <div class="col-sm-8">
                                        <select name="order_type" class="form-select" aria-label="Default select example">
                                            <option disabled>Pilih Jenis Pemesanan
                                            </option>
                                            @foreach (\App\Enums\ProdukOrderType::cases() as $status)
                                            <option id="order-{{ $status->value }}" value="{{ $status->value }}">
                                                {{ $status->getLabelText() }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="deskripsi" class="col-sm-4 col-form-label">Detail
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" style="height: 100px" placeholder="Detail" required></textarea>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-sm-4 col-form-label">Status
                                        Produk</label>
                                    <div class="col-sm-8">
                                        <select name="status" class="form-select" aria-label="Pilih Status">
                                            @foreach (\App\Enums\ProdukStatus::cases() as $status)
                                            <option id="status-{{ $status->value }}" value="{{ $status->value }}">
                                                {{ $status->getLabelText() }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- end edit modal --}}

<script>
    var imageInput = document.getElementById('imageInput');
    var imagePreview = document.getElementById('imagePreview');
    var cancelImage = document.getElementById('cancelImage');

    imageInput.addEventListener('change', function(event) {
        var reader = new FileReader();
        reader.onload = function() {
            imagePreview.src = reader.result;
            cancelImage.style.display = 'inline'; // Show cancel button
        };
        reader.readAsDataURL(event.target.files[0]);
    });

    cancelImage.addEventListener('click', function() {
        imagePreview.src = "assets/img/pamsi.jpeg";
        imageInput.value = ''; // Clear image input
        cancelImage.style.display = 'none'; // Hide cancel button
    });


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

    var produk_form = document.getElementById('produk_update_form');
    var produk_id = document.getElementById('produk_id');
    var produk_title = document.getElementById('produk_title');
    var produk_nama = document.getElementById('nama');
    var produk_harga = document.getElementById('harga');
    var produk_deskripsi = document.getElementById('deskripsi');

    function updateProduk(gambar, url, nama, harga, kategori_id, order_type, deskripsi, status) {
        produk_form.action = url;
        defaultImage = gambar;
        imagePreviewUpdate.src = gambar;
        produk_title.innerHTML = nama;
        produk_nama.value = nama;
        produk_harga.value = harga;
        produk_deskripsi.value = deskripsi;

        document.getElementById('kategori-' + kategori_id).selected = true;
        document.getElementById('order-' + order_type).selected = true;
        document.getElementById('status-' + status).selected = true;
    }
</script>
@endsection