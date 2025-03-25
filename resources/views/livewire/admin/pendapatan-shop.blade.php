<div>
    <h2 class="text-lg font-bold mb-4">Pendapatan Toko</h2>

    <h3 class="text-md font-semibold mt-4">Pendapatan Minggu Ini</h3>
    <table class="table-auto w-full border mt-2">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Toko</th>
                <th class="border px-4 py-2">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatanMinggu as $data)
                <tr>
                    <td class="border px-4 py-2">{{ $data->name }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="text-md font-semibold mt-6">Pendapatan Bulan Ini</h3>
    <table class="table-auto w-full border mt-2">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Nama Toko</th>
                <th class="border px-4 py-2">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatanBulan as $data)
                <tr>
                    <td class="border px-4 py-2">{{ $data->name }}</td>
                    <td class="border px-4 py-2">Rp {{ number_format($data->total_pendapatan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
