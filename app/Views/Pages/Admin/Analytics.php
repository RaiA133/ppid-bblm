<?php $this->extend('Layouts/Template'); ?>

<?php $this->section('content') ?>

<div class="flex flex-col bg-base-200 py-10" id="header-home" data-scroll>

    <section class="mx-10">
        <!-- Date Picker -->
        <div class="mb-6">
            <label for="datepicker" class="block text-sm font-medium text-gray-700">Select Date Range</label>
            <input id="datepicker" class="input input-bordered w-72 mt-1 block p-2 border-gray-300 rounded-md" type="text" placeholder="Select a date range">
        </div>
    </section>

    <section class="mx-4 grid grid-cols-1 sm:grid-cols-2 gap-4 justify-center mb-4">
        <!-- StackBarChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Sales</h2>
            <div class="h-72 lg:h-96">
                <canvas id="stackBarChart"></canvas>
            </div>
        </div>

        <!-- BarChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">No of Orders</h2>
            <div class="h-72 lg:h-96">
                <canvas id="barChart"></canvas>
            </div>
        </div>

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
                maintainAspectRatio: false,
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
                maintainAspectRatio: false, // Disable aspect ratio to fill the container
                plugins: {
                    legend: {
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            new Chart(ctx2, {
                type: 'bar',
                data: data2,
                options: options2
            });
        </script>

        <!-- DoughnutChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Category</h2>
            <div class="h-72 lg:h-96">
                <canvas id="DoughnutChart"></canvas>
            </div>
        </div>

        <!-- PieChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Country</h2>
            <div class="h-72 lg:h-96">
                <canvas id="PieChart"></canvas>
            </div>
        </div>
        <script>
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
                    maintainAspectRatio: false,
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
                    maintainAspectRatio: false,
                }
            });
        </script>

        <!-- ScatterChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Orders by Month (in k)</h2>
            <div class="h-72 lg:h-96">
                <canvas id="scatterChart"></canvas>
            </div>
        </div>

        <!-- LineChart -->
        <div class="bg-base-100 rounded-lg p-4 shadow-md">
            <h2 class="text-lg font-semibold mb-4">Monthly Active Users (in k)</h2>
            <div class="h-72 lg:h-96">
                <canvas id="lineChart"></canvas>
            </div>
        </div>
        <script>
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
                responsive: true,
                maintainAspectRatio: false,
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
                maintainAspectRatio: false,
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
        </script>
    </section>

    <script>
        // Initialize Flatpickr datepicker with range option
        flatpickr("#datepicker", {
            mode: "range",
            dateFormat: "Y-m-d",
        });



        // Date Picker initialization
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>

</div>

<?php $this->endSection() ?>