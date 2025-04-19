<div>
    <h2 class="text-lg font-bold mb-4">Pendapatan Toko per Minggu</h2>

    <table class="table-auto w-full border mt-2">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Toko</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Hari</th>
                <th class="border px-4 py-2">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $currentWeek = null;
            @endphp

            @foreach($pendapatanPerMinggu as $data)
                @if ($currentWeek !== $data->minggu)
                    @php
                        $currentWeek = $data->minggu;
                    @endphp
                    <tr>
                        <td colspan="4" class="text-center font-bold py-2 bg-gray-300">
                            Minggu ke-{{ substr($data->minggu, 4) }} Tahun {{ substr($data->minggu, 0, 4) }}
                        </td>
                    </tr>
                @endif

                <tr>
                    <td class="border px-4 py-2">{{ $data->nama_toko }}</td>
                    <td class="border px-4 py-2">{{ $data->tanggal }}</td>
                    <td class="border px-4 py-2">{{ $data->hari }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
