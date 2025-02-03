@extends('layouts.base')

@section('title', 'Invoice')

@section('body')
    <div class="px-5 py-10 flex justify-center">
        <div class="p-5 w-full max-w-3xl bg-white rounded-lg shadow overflow-hidden">
            <div class="flex gap-2 justify-between items-center">
                <img class="h-10" src="{{ asset('assets/images/pamsi-green.png') }}" alt="pamsi">
                <h1 class="text-[40px] font-medium text-[#012970]">Invoice</h1>
            </div>


            <div class="mt-4">
                <div class="space-y-1">
                    <h4 class="text-xl font-bold text-[#212529]">{{ $order->id }}</h4>
                    <h4 class="text-xl font-bold text-[#212529]">{{ $order->shop->name }}</h4>
                </div>

                <div class="mt-4 py-3 border-y-2 border-dashed overflow-y-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <td class="min-w-40">Nama Produk</td>
                                <td class="min-w-40 text-center">Harga Produk</td>
                                <td class="min-w-20 text-center">Jumlah</td>
                                <td class="text-end">Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="font-semibold min-w-40">{{ $product->name }}</td>
                                    <td class="font-semibold min-w-40 text-center">Rp{{ $product->price }}</td>
                                    <td class="font-semibold min-w-20 text-center">{{ $product->quantity }}</td>
                                    <td class="font-semibold text-end">Rp{{ $product->price * $product->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 flex justify-between">
                    <p class="text-[#212529]">Ongkos Kirim</p>
                    <p class="font-semibold text-[#212529]">Rp{{ $order->shipping_fee }}</p>
                </div>

                <div class="flex justify-between">
                    <p class="text-[#212529]">Total Pesanan</p>
                    <p class="font-semibold text-[#212529]">Rp{{ $order->total }}</p>
                </div>

                <div class="mt-10 space-y-2">
                    <div class="flex gap-2">
                        <p class="flex-1 max-w-40">Catatan</p>
                        <p class="font-semibold">:</p>
                        <p class="flex-1 font-semibold">{{ $order->note ?? '-' }} </p>
                    </div>
                    <div class="flex gap-2">
                        <p class="flex-1 max-w-40">Pembayaran</p>
                        <p class="font-semibold">:</p>
                        <p x-data class="flex-1 font-semibold"
                            x-text="'{{ $order->transaction->payment }}'
                            === 'cod' ? 'COD' : ('{{ $order->transaction->payment }}' === 'transfer' ? 'Transfer'
                            : 'E-Wallet' )">
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <p class="flex-1 max-w-40">Pengiriman</p>
                        <p class="font-semibold">:</p>
                        <p class="flex-1 font-semibold">{{ $order->shipping_text }}</p>
                    </div>
                    @if ($order->shipping != 'take-self')
                        <div class="flex gap-2">
                            <p class="flex-1 max-w-40">Alamat Pengiriman</p>
                            <p class="font-semibold">:</p>
                            <p class="flex-1 font-semibold">{{ $order->transaction->address }}</p>
                        </div>
                    @else
                        <div class="flex gap-2">
                            <p class="flex-1 max-w-40">Alamat Toko</p>
                            <p class="font-semibold">:</p>
                            <p class="flex-1 font-semibold">{{ $order->shop->address ?? '-' }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
