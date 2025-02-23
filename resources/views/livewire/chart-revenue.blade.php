<div>
    <div class="flex justify-between items-center mb-4">
    <h4 class="font-bold text-[#012970] text-xl">Laporan Penjualan</h4>
        <select wire:model="filter" id="filter" class="px-4 py-2 border rounded">
            <option value="daily">Per Hari</option>
            <option value="monthly">Per Bulan</option>
            <option value="yearly">Per Tahun</option>
        </select>
    </div>


    <div wire:ignore id="chart"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function renderChart() {
                document.querySelector("#chart").innerHTML = ""; // Hapus chart lama

                var options = {
                    series: @json($chartRevenueData['series']),
                    chart: {
                        type: 'line',
                        height: 350
                    },
                    xaxis: {
                        categories: @json($chartRevenueData['categories'])
                    }
                };

                var chart = new ApexCharts(document.querySelector("#chart"), options);
                chart.render();
            }

            renderChart();

            Livewire.on('chartUpdated', () => {
                renderChart();
            });

        });
    </script>

</div>