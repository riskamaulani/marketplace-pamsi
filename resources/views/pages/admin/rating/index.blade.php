@extends('layouts.admin')

@section('title', 'Shop')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Ulasan Produk</h2>
        </div>
    </section>

    {{-- Main section --}}
    <section class="p-4 w-full max-w-5xl space-y-4 bg-white shadow rounded-lg">
        @forelse ($ratings as $rating)
            <div class="border shadow rounded-md overflow-hidden">
                <div class="px-2 py-1 flex gap-2 justify-between bg-[#efecec]">
                    <p class="font-bold">#{{ $rating->order_id }}</p>
                    <a href="{{ route('order.show', $rating->order_id) }}"
                        class="text-[12px] text-blue-600 underline hover:no-underline self-center" target="_blank">Detail
                        Order</a>
                </div>

                <div class="px-2 py-1 flex gap-3">
                    <img class="shrink-0 size-20 object-cover object-center rounded-md"
                        src="{{ $rating->user_profile ? asset('storage/' . $rating->user_profile) : asset('assets/images/no-image.jpg') }}"
                        alt="{{ $rating->user_name }}">

                    <div class="flex-1">
                        <p class="font-bold">{{ $rating->user_name }}</p>
                        <div class="flex items-center">
                            @for ($i = 0; $i < $rating->rating; $i++)
                                <svg class="size-4 text-yellow-400 inline-flex" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049.297l2.9 5.883 6.528.947-4.724 4.606 1.114 6.49L10 14.347l-5.867 3.086 1.114-6.49L.523 7.127l6.528-.947L9.049.297z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="line-clamp-1 text-[12px] text-gray-400">{{ $rating->product_name }}</p>
                        <p class="mt-2 text-sm">{{ $rating->comment }}</p>
                    </div>
                </div>
            </div>
        @empty
            Belum ada ulasan
        @endforelse
    </section>
@endsection
