@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="space-y-5">
        {{-- Main section --}}
        <div class="flex gap-10 flex-col lg:flex-row">
            <div class="flex-1 max-w-5xl space-y-4">
                <div class="flex gap-10">
                    <img src="{{ asset('storage/' . $product->image) }}" alt=""
                        class="lg:sticky lg:top-4 w-full max-h-80 max-w-80 aspect-square object-cover object-center rounded-lg shadow">

                    <div class="flex-1 p-4 bg-white shadow rounded-lg">
                        <h3 class="text-xl font-bold uppercase">{{ $product->name }}</h3>
                        <p class="text-sm">Terjual {{ $product->sold }} @if ($product->ratings != null)
                                | <svg class="size-4 text-yellow-400 inline-flex" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                                </svg> {{ $product->ratings }}
                            @endif
                        </p>
                        <p class="mt-3 text-3xl font-bold">Rp{{ $product->price }}</p>

                        <div class="mt-6 border-y py-3 px-2">
                            <p class="text-sm font-bold text-green-600">Deskripsi</p>
                        </div>

                        <div class="py-3 px-2 text-sm font-medium">
                            {{ $product->description }}
                        </div>

                        <div class="mt-3 border-y py-3 px-2 flex gap-3 items-center justify-between">
                            <div class="flex gap-3 items-center">
                                <img src="{{ asset('storage/' . $product->shop->foto ?? 'assets/images/no-image.jpg') }}"
                                    alt="Toko" class="size-12 object-cover object-center rounded-full">

                                <div>
                                    <p class="font-bold">{{ $product->shop->name }}s</p>

                                    @php
                                        $open_status = (new \App\Actions\ShopOpenStatus())->handle(
                                            $product->shop->open_schedule,
                                        );
                                    @endphp
                                    <div @class([
                                        'w-fit px-3 rounded-md',
                                        'bg-myaccent' => $open_status == 'Buka',
                                        'bg-red-600' => $open_status == 'Tutup',
                                    ])>
                                        <p class="text-sm text-white text-center font-medium">
                                            {{ $open_status }}</p>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('shop.show', ['shop' => $product->shop_id]) }}"
                                class="px-2 py-1 text-white text-sm font-semibold border-2 border-myaccent bg-myaccent rounded-md hover:cursor-pointer">Lihat
                                Toko</a>
                        </div>
                    </div>
                </div>

                {{-- Rating Buyer --}}
                <div class="p-4 space-y-4 bg-white shadow rounded-lg">
                    <p class="font-semibold">Ulasan Pembeli</p>

                    <div>
                        @foreach ($product->rating as $rating)
                            <hr class="my-5">
                            <div class="space-y-3">
                                <div class="flex gap-3 items-center">
                                    <img src="{{ asset('storage/' . $rating->user->profile) }}"
                                        alt="{{ $rating->user->name }}"
                                        class="size-12 object-cover object-center rounded-full">

                                    <div>
                                        <p class="font-bold">{{ $rating->user->name }}</p>
                                        <div class="flex items-center">
                                            @for ($i = 0; $i < $rating->rating; $i++)
                                                <svg class="size-4 text-yellow-400 inline-flex" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                </div>

                                <p class="text-sm">{{ $rating->comment }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            @if (auth()->user()->shop?->id != $product->shop->id)
                <livewire:product-resources.add-to-cart :product="$product" />
            @endif
        </div>
    </div>
@endsection
