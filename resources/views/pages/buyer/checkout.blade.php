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
                                                <a href="#"><img src="../storage/{{$produk->gambar}}" alt="" class="rounded" width="70px" height="auto"></a>
                                            </div>
                                            <div class="col-sm-9">
                                               {{ $produk->nama }}
                                            </div>
                                        </div>

                                    </td>
                                    <td>
                                        {{ $count }}
                                    </td>
                                    <td>{{$produk->harga}}</td>

                                </tr>

                            </tbody>
                        </table>
                        <table>
                            <form action="{ route('produk.simpanTrans') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            <tbody>
                                <div class="row mb-3">
                                    
                                    <label for="catatan" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Catatan</label>
                                    <div class="col-sm-8">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control" name="catatan" placeholder="Catatan (Opsional)" id="catatan" style="height: 100px" required></textarea>
                                            <label for="catatan">Catatan (Opsional)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="jenispengiriman" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Jenis Pesanan</label>
                                    <div class="col-sm-8">
                                        <select name="tipeOrder" class="form-select" aria-label="Default select example" disabled>

                                            <option value="{{$produk->order_type}}">{{$produk->order_type}}</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="statusproduct" class="col-sm-4 col-form-label" style="font-weight:500;color:black">Metode Pengiriman</label>
                                    <div class="col-sm-8">
                                        <select name="tipePengiriman" class="form-select" aria-label="Default select example">
                                            @foreach (\App\Enums\DeliveryType::cases() as $pengiriman)
                                            <option value="{{ $pengiriman->value }}">
                                                {{ $pengiriman->getLabelText() }}
                                            </option>
                                            @endforeach

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
                                        <select name="tipePengiriman" class="form-select" aria-label="Default select example">
                                            @foreach (\App\Enums\PaymentType::cases() as $pembayaran)
                                            <option value="{{ $pengiriman->value }}">
                                                {{ $pembayaran->getLabelText() }}
                                            </option>
                                            @endforeach
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
                            <div class="col d-flex justify-content-end">x {{$count}}</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">Rp {{$total}}</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Ongkos Kirim</h6>
                            </div>
                            <div class="col d-flex justify-content-end">Rp 10000</div>
                        </div>

                        <hr class="line-divider">
                        <div class="row">
                            <div class="col">
                                <h6 style="font-weight: bold;">Total Harga</h6>
                            </div>
                            <div class="col d-flex justify-content-end">
                                <h6 style="font-weight: bold;">{{$total+10000}}</h6>
                            </div>
                        </div>
                        </hr>

                    </div>

                </div>
                <div class="card checkout overflow-auto">
              
                    <div class="card-body">
                        <h1 class="card-title-ringkasan ">Unggah Bukti Pembayaran</h1>
                        <div class="image-detail-product-big mb-2">
                            <img id="imagePreviewUpdate"
                                src="{{ '../assets/img/no-image.jpg' }}"
                                alt="Image Preview" class="rounded mx-auto d-block" width="200px"
                                height="200px" />
                            <div class="pt-2">
                                <button type="button" class="btn btn-danger btn-sm"
                                    style="display: none;" id="cancelImageUpdate">
                                    <i class="bi bi-trash" style="color:white;"></i>
                                </button>
                                <input type="file" id="imageInputUpdate" name="foto"
                                    accept="image/*" aria-label="File upload">
                            </div>

                        </div>

                        </form>

                        <div class="row mb-3">

                            <div class="col">
                                
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#buttonOrderNow">Buat Pesanan Sekarang</button>
                            <div class="modal fade" id="buttonOrderNow" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Apakah anda yakin untuk pesan sekarang?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <form action="{{ route('produk.simpanTrans') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        @csrf
                                            Upload Bukti Transaksi
                                            <input class="form-control" type="file" id="formFile" name="bukti"/>
                                            <input name="produk_id" type="hidden" class="form-control" value="{{$produk->id}}"/>
                                            <input name="harga" type="hidden" class="form-control" value="{{$produk->harga}}"/>
                                            <input name="jumlah" type="hidden" class="form-control" value="{{$count}}"/>
                                            <input name="total" type="hidden" class="form-control" value="{{$total+10000}}"/>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->

                        </div>
                    </div>
                
                </div>

            </div>
        </div>
</main>
<script>
        var defaultImage = @php echo isset($toko->foto) ? json_encode('storage/'.$toko->foto) : json_encode('assets/img/no-image.jpg'); @endphp

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