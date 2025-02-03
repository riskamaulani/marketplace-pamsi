@extends('layouts.admin')

@section('title', 'Transaksi')

@section('content')
    <section class="p-4 space-y-4 bg-white border rounded-md shadow-md">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-[#012970] text-3xl">Transaksi</h2>
        </div>

        <div>
            <livewire:transaction-resources.transaction-table />
        </div>
    </section>
@endsection

@push('other-components')
    <x-modal name="trx-confirm">
        <livewire:transaction-resources.transaction-confirm modalName="trx-confirm" />
    </x-modal>
@endpush
