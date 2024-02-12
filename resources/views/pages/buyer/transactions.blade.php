@extends('layouts.global-layout', [
'title' => 'Transaksi',
])

@section('content')
<main class="main history-transaction-buyer">
    <div class="container">
        <div class="row ">
            <div class="col-lg-12">
                <div class="card history-transaction overflow-auto">
                    <h1 class="card-title mx-3">Pesanan Saya</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body py-3 ">

                    <!-- transactions -->
                        <div class="row border rounded-top mx-2 mb-3">
                                <div class="col">
                                <div class="row border rounded-top" style="font-weight: bold;background-color:#EFECEC;">
                                    <div class="col-8 my-auto">
                                        Kedai Minuman Segar
                                    </div>
                                    
                                    <div class="col-4 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-danger my-1 px-3" style="font-size: small;" data-bs-toggle="modal" data-bs-target="#buttonCancel">
                                            Batalkan Pesanan (60 Menit)
                                            {{-- button batalkan pesanan cuma 60 menit --}}
                                        </button>
                                    </div>

                                </div>
                                <a href="{{ route('invoice') }}">
                                <div class="row  my-2">
                                    

                                        <div class="col-sm-3 my-auto ">Es Mentimun</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">2</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">COD (Rp0)</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">Rp20.000</div>
                                        <div class="col-sm-3 my-auto d-md-flex justify-content-md-end">
                                            <span class="badge bg-light text-success" >Menunggu Konfirmasi</span>
                                            {{-- 
                                                <span class="badge bg-light text-success" >Menunggu Konfirmasi</span>
                                                <span class="badge bg-success">Sedang Dikemas</span>
                                                <span class="badge bg-danger">Ditolak</span>
                                                <span class="badge bg-warning">Sedang Diantar</span>
                                                <span class="badge bg-secondary">Selesai</span>
                                                --}}
                                        </div>
                                    

                                </div>
                                </a>
                                
                            </div>
                        </div>
                        <!-- end  transactions-->

                        <!-- transactions -->
                        <div class="row border rounded-top mx-2 mb-3">
                                <div class="col">
                                <div class="row border rounded-top" style="font-weight: bold;background-color:#EFECEC;">
                                    <div class="col-8 my-auto">
                                        Kedai Minuman Segar
                                    </div>
                                    
                                    <div class="col-4 d-md-flex justify-content-md-end">
                                        <button type="submit" class="btn btn-primary my-1 px-3" style="font-size: small;" data-bs-toggle="modal" data-bs-target="#buttonReview">
                                            Beri Ulasan
                                        </button>
                                    </div>

                                </div>
                                <a href="{{ route('invoice') }}">
                                <div class="row  my-2">
                                    

                                        <div class="col-sm-3 my-auto ">Es Mentimun</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">2</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">COD (Rp0)</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">Rp20.000</div>
                                        <div class="col-sm-3 my-auto d-md-flex justify-content-md-end">
                                            <span class="badge bg-secondary">Selesai</span>
                                        </div>
                                    

                                </div>
                                </a>
                                
                            </div>
                        </div>
                        <!-- end  transactions-->

                        <!-- transactions -->
                        <div class="row border rounded-top mx-2 mb-3">
                                <div class="col">
                                <div class="row border rounded-top" style="font-weight: bold;background-color:#EFECEC;">
                                    <div class="col-8 my-auto">
                                        Kedai Minuman Segar
                                    </div>
                                    
                                    <div class="col-4 d-md-flex justify-content-md-end">
                                        <button disabled type="submit" class="btn btn-secondary my-1 px-3" style="font-size: small;" data-bs-toggle="modal" data-bs-target="#buttonReview">
                                            Beri Ulasan
                                        </button>
                                    </div>

                                </div>
                                <a href="{{ route('invoice') }}">
                                <div class="row  my-2">
                                    

                                        <div class="col-sm-3 my-auto ">Es Mentimun</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">2</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">COD (Rp0)</div>
                                        <div class="col-sm-2 my-auto d-md-flex justify-content-md-end">Rp20.000</div>
                                        <div class="col-sm-3 my-auto d-md-flex justify-content-md-end">
                                            <span class="badge bg-success">Sedang Dikemas</span>
                                        </div>
                                    

                                </div>
                                </a>
                                
                            </div>
                        </div>
                        <!-- end  transactions-->



                        
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Pop Up untuk button batalkan pesanan, muncul selama 60 menit setelah checkout -->
    <div class="modal fade" id="buttonCancel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Batalkan Pesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-2">
                    Apakah anda yakin untuk membatalkan pesanan?                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- pop up untuk button beri ulasan, muncul saat pesanan telah selesai -->
    <div class="modal fade" id="buttonReview" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Beri Ulasan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body mx-2">
                    
                    <div class="row ">
                        Berikan ulasan dan saran untuk produk dari toko ini!
                        <textarea name="ulasan" class="form-control" style="height: 100px" placeholder="Makanan ini sangat enak sekali!" required></textarea>
                    </div>
                    <div class="row">
                        Berikan rating 1-5 untuk produk ini!
                        <input name="rating" type="number" class="form-control" placeholder="5" required />
                        <!-- batasin cuma 1-5 numbernya -->
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Kirim Ulasan</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection