@props(['activate' => null, 'deactivate' => null])

<div class="flex space-x-2">
    @if ($data->role == 'pembeli')
        <button
            @click="$dispatch('{{ $activate }}'); $dispatch('{{ $activate }}-id', {data: '{{ $data->id }}'})"
            class="font-medium text-blue-600 hover:underline">Aktifkan</button>
    @endif

    @if ($data->role == 'penjual')
        <p class="font-medium text-myaccent">Sudah Aktif</p>
    @endif
</div>
