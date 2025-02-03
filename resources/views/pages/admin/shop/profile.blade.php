@extends('layouts.admin')

@section('title', 'Shop')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Toko <span
                    class="text-sm text-gray-500">({{ $shop->id }})</span>
            </h2>

            <a href="{{ route('shop.show', $shop) }}" target="_blank"
                class="px-5 py-2 text-white bg-myaccent hover:bg-myaccenthover font-medium tracking-[0.5px] rounded-md">
                Lihat Toko
            </a>
        </div>
    </section>

    {{-- Main section --}}
    <section class="max-w-7xl flex gap-5 flex-col lg:flex-row">
        <div class="lg:sticky lg:top-20 p-4 mx-auto w-full max-w-96 h-fit space-y-2 bg-white rounded-lg shadow">
            <img src="{{ $shop->foto ? asset('storage/' . $shop->foto) : asset('assets/images/no-image.jpg') }}" alt="Profile"
                class="w-full object-cover aspect-square rounded-lg">
            <p class="text-center text-xl font-semibold">{{ $shop->name ?? '-' }}</p>
        </div>

        <div class="flex-1 max-w-5xl h-fit space-y-4">
            <div x-data @reload-page.window="window.location.reload()" class="p-4 bg-white shadow rounded-lg">
                <livewire:shop-resources.shop-profile :shop="$shop" />
            </div>

            <div class="p-4 bg-white shadow rounded-lg">
                @include('profile.partials.update-shop-information-form')
            </div>
        </div>
    </section>
@endsection
