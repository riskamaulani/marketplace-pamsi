<div>
    <div class="flex justify-between items-center mb-4">
        <h4 class="font-bold text-[#012970] text-xl">Laporan Produk Terjual</h4>
        <select wire:model="filter" id="filter" class="px-4 py-2 border rounded">
            <option value="daily">Per Hari</option>
            <option value="monthly">Per Bulan</option>
            <option value="yearly">Per Tahun</option>
        </select>
    </div>



    <canvas id="salesChart"></canvas>

    <script>
        document.addEventListener('livewire:load', function() {
            console.log("Livewire Loaded, initializing chart...");

            const ctx = document.getElementById('salesChart');

            if (!ctx) {
                console.error("Canvas tidak ditemukan!");
                return;
            }

            let salesChart = new Chart(ctx.getContext('2d'), {
                type: 'bar',
                data: {
                    labels: @json($productNames),
                    datasets: [{
                        label: 'Produk Terjual',
                        data: @json($salesData),
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

            console.log("Chart initialized:", salesChart);

            Livewire.on('updateChart', (productNames, salesData) => {
                console.log("Event received:", productNames, salesData);
                salesChart.data.labels = productNames;
                salesChart.data.datasets[0].data = salesData;
                salesChart.update();
            });
        });
    </script>
</div>