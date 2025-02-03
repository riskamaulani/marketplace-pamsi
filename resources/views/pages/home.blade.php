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
                <ul class="flex gap-3 cursor-grab">
                    @foreach ($categories as $index => $category)
                        <a href="#" class="shrink-0">
                            <li class="py-2 px-4 text-white font-medium rounded-lg bg-opacity-90 transition-transform transform group-hover:scale-105"
                                style="background-color: {{ ['#FF5733', '#33A1FF', '#28A745', '#FFC107', '#6F42C1', '#E83E8C', '#20C997', '#FD7E14', '#17A2B8', '#DC3545'][$index % 10] }};">
                                {{ $category->name }}
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </section>

        {{-- Product Section --}}
        <section class="p-5 space-y-3 bg-white rounded-lg shadow-md">
            <div class="flex gap-2">
                <h4 class="text-lg text-[#212529] font-bold tracking-wide"><a href="{{ route('home') }}">Semua Produk</a>
                </h4>

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
