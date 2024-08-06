<x-layouts.app>
    <x-slot name="title">
        Essay Score Progress | {{ config('app.name') }}
    </x-slot>
    <x-dashboard.index>
        <x-slot name="title">
            Essay Score Progress
        </x-slot>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script>
            var values = @json($values);
            var labels = @json($labels);
        </script>
    <div class="chart-container md:w-4/5 mx-auto">
        <div
            x-data="{
        values: values,
        labels: labels,
        init() {
            let chart = new ApexCharts(this.$refs.chart, this.getOptions());
            chart.render();
        },
        getOptions() {
            return {
                chart: { type: 'line', toolbar: false },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val.toFixed(2); // Format score
                        }
                    }
                },
                xaxis: { categories: this.labels },
                series: [{ name: 'Average Score', data: this.values }],
                yaxis: {
                    min: 0,
                    max: 9
                }
            };
        }

    }"
            class="w-full mt-8"
        >
            <div x-ref="chart" class="rounded-lg bg-white p-8"></div>
        </div>
    </div>
    </x-dashboard.index>
</x-layouts.app>
