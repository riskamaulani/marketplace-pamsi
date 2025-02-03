@extends('layouts.admin')

@section('title', 'User')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Pengguna</h2>
        </div>

        <div>
            <livewire:user-resources.user-table />
        </div>
    </section>
@endsection

@push('other-components')
    <x-modal name="shop-activate">
        <livewire:shop-resources.shop-activate modalName="shop-activate" />
    </x-modal>
@endpush
