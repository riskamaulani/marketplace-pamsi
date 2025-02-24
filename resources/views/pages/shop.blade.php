@extends('layouts.app')

@section('title', 'Toko')

@section('content')
    <div class="space-y-5">
        {{-- Header section --}}
        <section class="px-4 py-3 bg-white rounded-lg shadow-md">
            <p class="text-xl text-[#212529] font-semibold">{{ $shop->name }}</p>
        </section>

        {{-- Main section --}}
        <section class="flex gap-5 flex-col lg:flex-row">
            <div class="space-y-5">
                <div class="mx-auto w-full max-w-80 h-fit bg-white rounded-lg shadow overflow-hidden">
                    <img src="{{ asset('storage/' . $shop->foto ?? 'assets/images/no-image.jpg') }}" alt="Toko"
                        class="w-full object-cover object-center aspect-square">
                    @php
                        $open_status = (new \App\Actions\ShopOpenStatus())->handle($shop->open_schedule);
                    @endphp
                    <p @class([
                        'py-2 text-center text-white font-semibold',
                        'bg-myaccent' => $open_status == 'Buka',
                        'bg-red-600' => $open_status == 'Tutup',
                    ])>
                        {{ $open_status }}</p>
                </div>

                @php
                    $scheduleAction = new \App\Actions\GenerateOpenSchedule();
                    $schedule = $scheduleAction->handle($shop->open_schedule);
                @endphp

                <div class="p-5 mx-auto w-full max-w-80 h-fit space-y-2 bg-white rounded-lg shadow">
                    <p class="text-sm text-[#6d7588] font-semibold">Jadwal Buka</p>
                    <p class="">{{ $schedule }}</p>
                </div>

                <div class="p-5 mx-auto w-full max-w-80 h-fit space-y-2 bg-white rounded-lg shadow">
                    <p class="text-sm text-[#6d7588] font-semibold">Tentang Toko</p>
                    <p class="">{!! nl2br($shop->description ?? '-') !!}</p>
                </div>
            </div>

            <div class="flex-1 max-w-5xl space-y-4">
                <div class="p-4 bg-white shadow rounded-lg">
                


                    <livewire:shop-resources.shop-product />
                </div>
            </div>
        </section>
    </div>
@endsection
