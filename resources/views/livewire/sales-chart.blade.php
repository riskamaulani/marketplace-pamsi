<div>
    <div class="flex justify-between items-center mb-4">
        <h4 class="font-bold text-[#012970] text-xl">Laporan Produk Terjual</h4>
        <select wire:model="filter" wire:change="loadData" id="filter" class="py-2 px-8 border rounded">
            <option value="daily">Per Hari</option>
            <option value="monthly">Per Bulan</option>
            <option value="yearly">Per Tahun</option>
        </select>
    </div>

    <canvas id="salesChart"></canvas>

    <script>
        window.onload = function () {
            console.log("✅ Window Loaded!");

            if (!window.Livewire) {
                console.error("❌ Livewire Not Found!");
                return;
            }

            console.log("✅ Livewire Found!");

            let ctx = document.getElementById('salesChart');
            if (!ctx) {
                console.error("🚨 Canvas tidak ditemukan!");
                return;
            }

            let salesChart = null;

            function initializeChart(productNames = [], salesData = []) {
                if (salesChart) {
                    salesChart.destroy();
                }

                salesChart = new Chart(ctx.getContext('2d'), {
                    type: 'bar',
                    data: {
                        labels: productNames,
                        datasets: [{
                            label: 'Produk Terjual',
                            data: salesData,
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

                console.log("📈 Chart initialized:", salesChart);
            }

            // Coba tampilkan event Livewire di console
            Livewire.hook('message.received', (message, component) => {
                console.log("📩 Livewire Message Received:", message, component);
            });

            // Load awal
            initializeChart(@json($productNames ?? []), @json($salesData ?? []));

            // Update chart saat Livewire mengirim data baru
            Livewire.on('updateChart', (data) => {
                console.log("🔄 Event 'updateChart' diterima:", data);

                let productNames = Object.values(data.productNames || []);
                let salesData = Object.values(data.salesData || []);

                console.log("📊 Data setelah dikonversi:", productNames, salesData);

                salesChart.data.labels = productNames;
                salesChart.data.datasets[0].data = salesData;
                salesChart.update();
            });
        };
    </script>
</div>
