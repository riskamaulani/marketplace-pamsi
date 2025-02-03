@extends('layouts.admin')

@section('title', 'Kategori')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Kategori</h2>

            <button x-data @click="$dispatch('category-create')"
                class="px-5 py-2 text-white bg-myaccent hover:bg-myaccenthover font-medium tracking-[0.5px] rounded-md">Tambah
                Kategori
            </button>
        </div>

        <div>
            <livewire:category-resources.category-table />
        </div>
    </section>
@endsection

@push('other-components')
    <x-modal name="category-create">
        <livewire:category-resources.category-create modalName="category-create" />
    </x-modal>

    <x-modal name="category-edit">
        <livewire:category-resources.category-edit modalName="category-edit" />
    </x-modal>

    <x-modal name="category-delete">
        <livewire:category-resources.category-delete modalName="category-delete" />
    </x-modal>
@endpush
