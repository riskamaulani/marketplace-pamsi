@extends('layouts.app')

@section('title', 'Pesanan')

@section('content')
    <div x-data @reload-page.window="window.location.reload()" class="space-y-5">
        {{-- Header section --}}
        <section class="px-4 py-3 bg-white rounded-lg shadow-md">
            <p class="text-xl text-[#212529] font-semibold">Pesanan Saya</p>
        </section>

        {{-- Main section --}}
        <section class="p-4 space-y-4 bg-white rounded-lg shadow">
            @foreach ($orders as $order)
                <div class="border rounded-md shadow overflow-hidden">
                    <div class="py-2 px-3 flex gap-2 justify-between items-center bg-[#efecec]">
                        <h5 class="font-bold">{{ $order->shop->name }}</h5>

                        @if ($order->status == 'confirm')
                            <a href="https://api.whatsapp.com/send?phone=6282320825400&text=Saya ingin membatalkan pesanan dengan ID Transaksi {{ $order->transaction_id }}"
                                target="_blank" class="py-2 px-3 bg-[#e13647] hover:bg-[#bb2d3b] rounded-md">
                                <p class="text-[13px] text-white">Batalkan Pesanan</p>
                            </a>
                        @elseif ($order->status == 'shipping')
                            <button class="py-2 px-3 bg-[#f6781d] hover:bg-[#b86a33] rounded-md"
                                @click="$dispatch('order-detail-id', { order: '{{ $order->id }}' }); $dispatch('order-done-confirmation'); ">
                                <p class="text-[13px] text-white">Selesaikan Pesanan</p>
                            </button>
                        @elseif ($order->status == 'done' && !$order->rating)
                            <button x-data class="py-2 px-3 bg-myaccent hover:bg-myaccenthover rounded-md"
                                @click="$dispatch('give-rating', { products: {{ json_encode($order->products) }} }); $dispatch('set-rating-data', { order: '{{ $order->id }}',data: {{ json_encode($order->products) }} }); $dispatch('product-ratings');">
                                <p class="text-[13px] text-white">Beri Ulasan</p>
                            </button>
                        @endif
                    </div>

                    <a href="{{ route('order.show', $order) }}" target="_blank">
                        <div class="py-2 px-3 flex gap-2 justify-between">
                            @php
                                $num = count($order->products) - 1;
                            @endphp

                            <div class="flex-1 space-y-1">
                                <p>{{ $order->products[0]['name'] }}</p>

                                @if ($num)
                                    <p class="text-[12px] text-[#6d7588]">+{{ $num }} produk lainnya</p>
                                @endif
                            </div>

                            <div class="flex gap-2 justify-end items-center">
                                <div class="text-center">
                                    <p class="text-[12px] text-[#6d7588]">Total Belanja</p>
                                    <p class="text-[15px] font-bold">Rp{{ $order->total }}</p>
                                </div>

                                <div class="w-28 flex justify-end">
                                    <p @class([
                                        'py-1 px-2 text-[12px] text-end font-bold rounded-md',
                                        'text-[#f6781d]' => $order->status == 'confirm',
                                        'text-[#198754]' => $order->status == 'process',
                                        'text-white bg-[#f6781d]' => $order->status == 'shipping',
                                        'text-white bg-[#DC3545]' => $order->status == 'reject',
                                        'text-white bg-[#198754]' => $order->status == 'done',
                                    ])>
                                        @if ($order->status == 'confirm')
                                            Menunggu Konfirmasi
                                        @elseif ($order->status == 'reject')
                                            Dibatalkan
                                        @elseif ($order->status == 'process')
                                            Diproses
                                        @elseif ($order->status == 'shipping')
                                            Dikirim
                                        @elseif ($order->status == 'done')
                                            Selesai
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </section>
    </div>
@endsection

@push('other-components')
    <!-- Confirmation Modal -->
    <div x-cloak x-data="{ showModal: false }" x-show="showModal" @order-done-confirmation.window="showModal = true"
        class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
        <div class="w-full max-w-sm bg-white p-5 rounded-lg">
            <h3 class="text-lg font-semibold">Selesaikan Pesanan?</h3>
            <p>Produk sudah diterima?</p>
            <div class="flex gap-2 mt-4 justify-end">
                <button @click="$dispatch('update-order-status', { data: 'done' }); showModal = false; "
                    class="px-4 py-2 bg-myaccent text-white rounded">Iya</button>
                <button @click="showModal = false" class="px-4 py-2 bg-gray-500 text-white rounded">Batal</button>
            </div>
        </div>
    </div>

    <x-modal name="order-detail">
        <livewire:order-resources.order-detail modalName="order-detail" />
    </x-modal>

    <x-modal name="product-ratings">
        <livewire:product-resources.product-rating modalName="product-ratings" />
    </x-modal>
@endpush
