<div>
    <div class="flex justify-between items-center mb-4">
        <h4 class="font-bold text-[#012970] text-xl">Laporan Produk Terjual</h4>
        <select wire:model="filter" id="filter" class="px-4 py-2 border rounded">
            <option value="daily">Per Hari</option>
            <option value="monthly">Per Bulan</option>
            <option value="yearly">Per Tahun</option>
        </select>
    </div>

    <div wire:ignore.self>
        <div id="product-sales-chart"></div>
    </div>

    <script>
        document.addEventListener('livewire:load', function() {
            let chartElement = document.querySelector("#product-sales-chart");
            let productSalesChart;

            function initChart(chartData) {
                console.log("Chart Data Received:", chartData); // LOG DATA

                if (productSalesChart) {
                    productSalesChart.destroy(); // Hancurkan chart sebelumnya
                }

                if (!chartData || !chartData.series || chartData.series.length === 0) {
                    chartElement.innerHTML = "<p class='text-center text-gray-500'>Tidak ada data tersedia</p>";
                    return;
                }

                productSalesChart = new ApexCharts(chartElement, {
                    chart: {
                        type: 'bar',
                        height: 350
                    },
                    series: chartData.series,
                    xaxis: {
                        categories: chartData.categories
                    }
                });

                productSalesChart.render();
            }

            // Debugging: Lihat data awal dari Blade
            let initialChartData = @json($chartProductData ?? ['series' => [], 'categories' => []]);
            console.log("Initial Chart Data:", initialChartData); // LOG DATA
            initChart(initialChartData);

            // Debugging: Lihat data update dari Livewire
            Livewire.on('chartUpdated', (chartProductData) => {
                console.log("Updated Chart Data:", chartProductData); // LOG DATA
                initChart(chartProductData);
            });
        });
    </script>
</div>