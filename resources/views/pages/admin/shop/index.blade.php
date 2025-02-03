@extends('layouts.admin')

@section('title', 'Shop')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Toko</h2>
        </div>

        <div>
            <livewire:shop-resources.shop-table />
        </div>
    </section>
@endsection

@push('other-components')
    {{-- <x-modal name="product-edit">
        <livewire:product-resources.product-edit modalName="product-edit" />
    </x-modal>

    <x-modal name="product-delete">
        <livewire:product-resources.product-delete modalName="product-delete" />
    </x-modal> --}}
@endpush
