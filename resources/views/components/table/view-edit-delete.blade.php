@props(['view' => null, 'edit' => null, 'delete' => null])

<div class="flex space-x-2">
    @if ($view)
        <a href="{{ $view }}" class="font-medium text-green-600 hover:underline">Lihat</a>
    @endif

    @if ($edit)
        <button
            @click="$dispatch('{{ $edit }}'); $dispatch('{{ $edit }}-id', {data: '{{ $id }}'})"
            class="font-medium text-blue-600 hover:underline">Edit</button>
    @endif

    @if ($delete)
        <button x-data
            @click="$dispatch('{{ $delete }}'); $dispatch('{{ $delete }}-id', {data: '{{ $id }}'})"
            class="font-medium text-red-600
            hover:underline">Hapus</button>
    @endif
</div>
