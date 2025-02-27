@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="space-y-5">
    {{-- Hero section --}}
    <section>
        <img src="{{ asset('assets/images/home-hero.png') }}" alt="Pamsi Home Hero" class="rounded-lg shadow-md">
    </section>

    {{-- Categories Section --}}
    <section class="p-5 space-y-3 bg-white rounded-lg shadow-md">
        <h4 class="text-lg text-[#212529] font-bold tracking-wide">Kategori</h4>
        <div class="overflow-hidden" x-data="{ isDragging: false, startX: 0, scrollLeft: 0 }"
            @mousedown="isDragging = true; startX = $event.pageX - $event.currentTarget.offsetLeft; scrollLeft = $event.currentTarget.scrollLeft; $event.currentTarget.style.cursor = 'grabbing';"
            @mousemove="if (isDragging) { const x = $event.pageX - $event.currentTarget.offsetLeft; $event.currentTarget.scrollLeft = scrollLeft - (x - startX) * 2; }"
            @mouseup="isDragging = false; $event.currentTarget.style.cursor = 'grab';"
            @mouseleave="isDragging = false; $event.currentTarget.style.cursor = 'grab';"
            @touchstart="isDragging = true; startX = $event.touches[0].pageX - $event.currentTarget.offsetLeft; scrollLeft = $event.currentTarget.scrollLeft;"
            @touchmove="if (isDragging) { const x = $event.touches[0].pageX - $event.currentTarget.offsetLeft; $event.currentTarget.scrollLeft = scrollLeft - (x - startX) * 2; }"
            @touchend="isDragging = false;">

        </div>

        <!-- Tombol kategori -->
        <div class="flex gap-3 mb-4">
            <a href="{{ route('home') }}"
                class="px-4 py-2 rounded-lg font-medium text-white transition-transform transform hover:scale-105
                      {{ request('category') ?'bg-[#008001]' : 'bg-[#008001]' }}">
                Semua Kategori
            </a>

            @foreach ($categories as $category)
            <a href="{{ route('home', ['category' => $category->id]) }}"
                class="px-4 py-2 rounded-lg font-medium text-white transition-transform transform hover:scale-105
                          {{ request('category') == $category->id ? 'bg-[#008001]' : 'bg-[#008001]' }}">
                {{ $category->name }}
            </a>
            @endforeach
        </div>


    </section>

    {{-- Product Section --}}
    <section class="p-5 space-y-3 bg-white rounded-lg shadow-md">
        <div class="flex gap-2">
            <h4 class="text-lg text-[#212529] font-bold tracking-wide"><a href="{{ route('home') }}">Semua Produk</a>
            </h4>

            <!-- Filter Aktif -->
            @if (request('category') || request('search'))
            <span class="text-lg text-[#212529] font-bold tracking-wide">
                @if (request('category') && request('search'))
                (Kategori: {{ $categories->firstWhere('id', request('category'))->name ?? 'Tidak Diketahui' }},
                Pencarian: "{{ request('search') }}")
                @elseif (request('category'))
                (Kategori: {{ $categories->firstWhere('id', request('category'))->name ?? 'Tidak Diketahui' }})
                @elseif (request('search'))
                (Pencarian: "{{ request('search') }}")
                @endif
            </span>
            @endif

        </div>

        <livewire:product-resources.product-all />
    </section>
</div>
@endsection