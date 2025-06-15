<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Uji Performa Sistem - Aplikasi Absensi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 2rem;
            background: #f8f9fa;
            text-align: center;
        }
        h1 {
            margin-bottom: 2rem;
            color: #4e54c8;
        }
        .charts-wrapper {
            display: flex;
            justify-content: center;
            gap: 2rem; /* jarak antar chart */
            flex-wrap: wrap; /* responsif, pindah baris jika layar kecil */
        }
        .chart-container {
            max-width: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

    <h1>Uji Performa Sistem Absensi</h1>

    <div class="charts-wrapper">
        <div class="chart-container">
            <canvas id="cpuChart"></canvas>
        </div>
        <div class="chart-container">
            <canvas id="ramChart"></canvas>
        </div>
    </div>

    <script>
        const cpuCtx = document.getElementById('cpuChart').getContext('2d');
        const ramCtx = document.getElementById('ramChart').getContext('2d');

        const cpuChart = new Chart(cpuCtx, {
            type: 'pie',
            data: {
                labels: ['CPU Usage', 'CPU Idle'],
                datasets: [{
                    label: 'CPU Usage',
                    data: [0, 100],
                    backgroundColor: ['#4e54c8', '#d1d1e9'],
                    hoverOffset: 20,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: { display: true, text: 'CPU Usage (%)' }
                }
            }
        });

        const ramChart = new Chart(ramCtx, {
            type: 'pie',
            data: {
                labels: ['RAM Used', 'RAM Free'],
                datasets: [{
                    label: 'RAM Usage',
                    data: [0, 100],
                    backgroundColor: ['#f46b45', '#f8cdda'],
                    hoverOffset: 20,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: { display: true, text: 'RAM Usage (%)' }
                }
            }
        });

        // Contoh data random untuk simulasi update realtime
        function getRandomUsage() {
            return Math.floor(Math.random() * 100);
        }

        function updateCharts() {
            const cpu = getRandomUsage();
            const ram = getRandomUsage();

            cpuChart.data.datasets[0].data = [cpu, 100 - cpu];
            cpuChart.update();

            ramChart.data.datasets[0].data = [ram, 100 - ram];
            ramChart.update();
        }

        updateCharts();
        setInterval(updateCharts, 3000);
    </script>

</body>
</html>
