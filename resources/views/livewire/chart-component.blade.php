<div>
    <div id="chart"></div>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                chart: {
                    type: 'line'
                },
                series: @json($chartData['series']),
                xaxis: {
                    categories: @json($chartData['categories'])
                }

            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        });
    </script>
</div>