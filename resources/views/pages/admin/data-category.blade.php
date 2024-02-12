@extends('layouts.panel-layout')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Data Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Data Kategori</li>
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
                                <h5 class="card-title">Data Kategori</h5>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-end">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddNewSeller"><i class="bi bi-plus"></i>
                                Tambah Kategori</button>

                                <div class="modal fade" id="modalAddNewSeller" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Tambah Kategori</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl">
                                                        <div class="col-xl">
                                                            <form action="{{route('category.add')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                                                @csrf
                                                                <div class="row mb-3">
                                                                    <label for="name" class="col-sm-4 col-form-label">
                                                                        Nama Kategori
                                                                    </label>
                                                                    <div class="col-sm-8">
                                                                        <input name="nama" type="text" class="form-control" placeholder="Nama Kategori" required>
                                                                    </div>
                                                                </div>

                                                                

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">Tambah Kategori</button>
                                                                </div>


                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

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
                                    <th scope="col-sm-4">Nomor Kategori</th>
                                    <th scope="col-sm-4">Nama Kategori</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategori as $kat)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>
                                        <a href="">{{ $kat->id }}</a>
                                    </td>
                                    <td>
                                        <a href="">{{ $kat->nama }}</a>
                                    </td>
                                    
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                        
                    </div>
                </div>

            </div>
        </div>
        
    </section>

</main><!-- End #main -->
@endsection