<div x-data class="flex space-x-2">
    @if ($data->status == 'confirm')
        {{-- <button @click="$dispatch('trx-confirm'); $dispatch('trx-id', {data: '{{ $data->id }}', mode: 'accept'})"
            class="font-medium text-blue-600 hover:underline">Konfirmasi</button>

        <button x-data
            @click="$dispatch('trx-confirm'); $dispatch('trx-id', {data: '{{ $data->id }}', mode: 'reject'})"
            class="font-medium text-red-600
            hover:underline">Batalkan</button> --}}

        <button
            @click="$dispatch('trx-confirm'); $dispatch('trx-confirm-modal', { id: '{{ $data->id }}', mode: 'accept' }); $dispatch('trx-id', {data: '{{ $data->id }}', mode: 'accept'})"
            class="font-medium text-blue-600 hover:underline">Konfirmasi</button>

        <button
            @click="$dispatch('trx-confirm'); $dispatch('trx-confirm-modal', { id: '{{ $data->id }}', mode: 'reject' }); $dispatch('trx-id', {data: '{{ $data->id }}', mode: 'reject'})""
            class="font-medium text-red-600
                hover:underline">Batalkan</button>
    @elseif ($data->status == 'accept')
        <p class="font-medium text-white px-2 py-1 bg-myaccent rounded-md">Diterima</p>
    @elseif ($data->status == 'reject')
        <p class="font-medium text-white px-2 py-1 bg-red-600 rounded-md">Dibatalkan</p>
    @endif
</div>
