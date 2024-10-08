<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<section class="container mx-auto p-4 md:p-6">
    <!-- Date Picker -->
    <div class="w-full md:w-72 mb-6">
        <input id="datepicker" class="input input-bordered w-full bg-white p-2 rounded-lg shadow-md" placeholder="Select Date Range">
    </div>

    <!-- Charts Grid -->
    <div class="grid lg:grid-cols-2 gap-6">
        <!-- StackBarChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Sales</h2>
            <div class="h-96">
                <canvas id="stackBarChart"></canvas>
            </div>
        </div>

        <!-- BarChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">No of Orders</h2>
            <div class="h-96">
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <!-- DoughnutChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Category</h2>
            <div class="h-96">
                <canvas id="DoughnutChart"></canvas>
            </div>
        </div>

        <!-- PieChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Country</h2>
            <div class="h-96">
                <canvas id="PieChart"></canvas>
            </div>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <!-- ScatterChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Month (in k)</h2>
            <div class="h-96">
                <canvas id="scatterChart"></canvas>
            </div>
        </div>

        <!-- LineChart -->
        <div class="bg-white rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Monthly Active Users (in k)</h2>
            <div class="h-96">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Stack Bar Chart
        const ctx1 = document.getElementById('stackBarChart').getContext('2d');
        const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        const data1 = {
            labels: labels,
            datasets: [{
                    label: 'Store 1',
                    data: labels.map(() => Math.random() * 1000 + 500),
                    backgroundColor: 'rgba(255, 99, 132, 1)'
                },
                {
                    label: 'Store 2',
                    data: labels.map(() => Math.random() * 1000 + 500),
                    backgroundColor: 'rgba(53, 162, 235, 1)'
                },
                {
                    label: 'Store 3',
                    data: labels.map(() => Math.random() * 1000 + 500),
                    backgroundColor: 'rgba(235, 162, 235, 1)'
                }
            ]
        };

        const options1 = {
            responsive: true,
            scales: {
                x: {
                    stacked: true
                },
                y: {
                    stacked: true
                }
            }
        };

        new Chart(ctx1, {
            type: 'bar',
            data: data1,
            options: options1
        });

        // Bar Chart
        const ctx2 = document.getElementById('barChart').getContext('2d');
        const data2 = {
            labels: labels,
            datasets: [{
                    label: 'Store 1',
                    data: labels.map(() => Math.random() * 1000 + 500),
                    backgroundColor: 'rgba(255, 99, 132, 1)'
                },
                {
                    label: 'Store 2',
                    data: labels.map(() => Math.random() * 1000 + 500),
                    backgroundColor: 'rgba(53, 162, 235, 1)'
                }
            ]
        };

        const options2 = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                }
            }
        };

        new Chart(ctx2, {
            type: 'bar',
            data: data2,
            options: options2
        });

        // Doughnut Chart
        const doughnutLabels = ['Electronics', 'Home Appliances', 'Beauty', 'Furniture', 'Watches', 'Apparel'];
        const doughnutData = [122, 219, 30, 51, 82, 13];
        const doughnutBackgroundColor = [
            'rgba(255, 99, 132, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 86, 0.8)',
            'rgba(75, 192, 192, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 64, 0.8)',
        ];

        const doughnutCtx = document.getElementById('DoughnutChart').getContext('2d');
        new Chart(doughnutCtx, {
            type: 'doughnut',
            data: {
                labels: doughnutLabels,
                datasets: [{
                    label: '# of Orders',
                    data: doughnutData,
                    backgroundColor: doughnutBackgroundColor,
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                },
            }
        });

        // Pie Chart
        const pieLabels = ['India', 'Middle East', 'Europe', 'US', 'Latin America', 'Asia (non-India)'];
        const pieData = [122, 219, 30, 51, 82, 13];
        const pieBackgroundColor = [
            'rgba(255, 99, 255, 0.8)',
            'rgba(54, 162, 235, 0.8)',
            'rgba(255, 206, 255, 0.8)',
            'rgba(75, 192, 255, 0.8)',
            'rgba(153, 102, 255, 0.8)',
            'rgba(255, 159, 255, 0.8)',
        ];

        const pieCtx = document.getElementById('PieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    label: '# of Orders',
                    data: pieData,
                    backgroundColor: pieBackgroundColor,
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    },
                },
            }
        });

        // Scatter Chart
        const scatterCtx = document.getElementById('scatterChart').getContext('2d');
        const scatterData = {
            datasets: [{
                    label: 'Orders > 1k',
                    data: Array.from({
                        length: 100
                    }, () => ({
                        x: Math.random() * 11,
                        y: Math.random() * 31,
                    })),
                    backgroundColor: 'rgba(255, 99, 132, 1)',
                },
                {
                    label: 'Orders > 2K',
                    data: Array.from({
                        length: 100
                    }, () => ({
                        x: Math.random() * 12,
                        y: Math.random() * 12,
                    })),
                    backgroundColor: 'rgba(0, 0, 255, 1)',
                },
            ],
        };

        const scatterOptions = {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        };

        new Chart(scatterCtx, {
            type: 'scatter',
            data: scatterData,
            options: scatterOptions,
        });

        // Line Chart
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        const lineData = {
            labels: labels,
            datasets: [{
                label: 'Monthly Active Users',
                data: labels.map(() => Math.random() * 1000 + 500),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
            }],
        };

        const lineOptions = {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
            },
        };

        new Chart(lineCtx, {
            type: 'line',
            data: lineData,
            options: lineOptions,
        });

        // Date Picker initialization
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</section>

<?php $this->endSection() ?>