@extends('layouts.admin')

@section('title', 'Pesanan')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Pesanan</h2>
        </div>

        <div>
            <livewire:order-resources.order-table />
        </div>
    </section>
@endsection

@push('other-components')
    <x-modal name="order-detail">
        <livewire:order-resources.order-detail modalName="order-detail" />
    </x-modal>
@endpush
