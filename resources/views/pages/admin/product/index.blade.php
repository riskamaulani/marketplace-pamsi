@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Produk</h2>

            <button x-data @click="$dispatch('product-create')"
                class="px-5 py-2 text-white bg-myaccent hover:bg-myaccenthover font-medium tracking-[0.5px] rounded-md">Tambah
                Produk
            </button>
        </div>

        <div>
            <livewire:product-resources.product-table />
        </div>
    </section>
@endsection

@push('other-components')
    <x-modal name="product-create">
        <livewire:product-resources.product-create modalName="product-create" />
    </x-modal>

    <x-modal name="product-edit">
        <livewire:product-resources.product-edit modalName="product-edit" />
    </x-modal>

    <x-modal name="product-delete">
        <livewire:product-resources.product-delete modalName="product-delete" />
    </x-modal>
@endpush
