@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
    <div class="space-y-5">
        {{-- Header section --}}
        <section class="px-4 py-3 bg-white rounded-lg shadow-md">
            <p class="text-xl text-[#212529] font-semibold">Checkout</p>
        </section>

        {{-- Main section --}}
        <livewire:product-resources.checkout :shops="$shops" overallTotalPrice="{{ $overallTotalPrice }}"
            productTotal="{{ $productTotal }}" />
    </div>
@endsection
