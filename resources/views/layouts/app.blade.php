<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistem Absensi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right top, #f0f9ff, #e0f2fe);
            margin: 0;
            padding: 0;
            color: #1e293b;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(12px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            z-index: 1001;
        }

        .navbar-brand {
            color: blue;
            transition: color 0.3s ease;
        }

        body.dark-mode .navbar-brand {
            color: white !important;
        }

        .sidebar {
            width: 260px;
            position: fixed;
            top: 60px;
            left: 0;
            bottom: 0;
            background: linear-gradient(to bottom right, rgba(173, 216, 230, 0.8), rgba(224, 242, 254, 0.8));
            padding: 20px;
            backdrop-filter: blur(14px);
            border-right: 1px solid rgba(0, 0, 0, 0.08);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 10px;
            transition: transform 0.3s ease-in-out;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .sidebar a {
            padding: 14px 18px;
            border-radius: 12px;
            transition: all 0.2s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            color: #1e293b;
        }

        .sidebar a:hover {
            background: linear-gradient(to right, #38bdf8, #0ea5e9);
            color: white;
            transform: scale(1.02);
            box-shadow: 0 2px 8px rgba(14, 165, 233, 0.2);
        }

        .content {
            margin-left: 280px;
            padding: 40px;
            transition: margin-left 0.3s ease-in-out;
        }

        .content.full-width {
            margin-left: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.55);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: #1e293b;
        }

        .glass-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .glass-clock {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 14px;
            padding: 16px 24px;
            color: #0ea5e9;
            box-shadow: 0 3px 10px rgba(14, 165, 233, 0.1);
            backdrop-filter: blur(10px);
            width: fit-content;
            margin-top: 30px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert {
            animation: fadeIn 0.6s ease-in;
        }

        /* DARK MODE */
        body.dark-mode {
            background: #0f172a;
            color: #f1f5f9;
        }

        body.dark-mode .navbar,
        body.dark-mode .sidebar,
        body.dark-mode .glass-card,
        body.dark-mode .glass-clock {
            background: rgba(30, 41, 59, 0.85) !important;
            color: #f1f5f9;
            border-color: rgba(255, 255, 255, 0.1);
        }

        body.dark-mode .sidebar a {
            color: #f1f5f9;
        }

        body.dark-mode .sidebar a:hover {
            background: linear-gradient(to right, #3b82f6, #2563eb);
            color: #fff;
        }

        /* FPS Meter */
        .fps-meter {
            position: fixed;
            right: 16px;
            bottom: 16px;
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 6px 14px;
            font-size: 13px;
            font-weight: 600;
            color: #1e293b;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            z-index: 1100;
        }

        body.dark-mode .fps-meter {
            background: rgba(30, 41, 59, 0.75);
            color: #f1f5f9;
        }
    </style>
    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid justify-content-between">
        <a class="navbar-brand fw-bold" href="{{ route('login') }}">
            <i class="bi bi-fingerprint me-2"></i> Aplikasi Absensi
        </a>
        <div class="d-flex gap-2">
            <button id="toggle-sidebar" class="btn btn-outline-secondary btn-sm">
                <i class="bi bi-list"></i>
            </button>
            <button id="theme-toggle" class="btn btn-outline-primary btn-sm">
                <i class="bi bi-moon-fill me-1"></i> Dark Mode
            </button>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2 me-2"></i> Dashboard Statistik Absensi</a>
    <a href="{{ route('absensi.index') }}"><i class="bi bi-clock-history me-2"></i> Data Absensi</a>
    <a href="{{ route('absensi.create') }}"><i class="bi bi-plus-circle me-2"></i> Tambah Absensi</a>
    <a href="{{ route('rekap.bulanan') }}"><i class="bi bi-calendar-check me-2"></i> Rekap Data Bulanan</a>
    <a href="{{ route('laporan.cetak') }}"><i class="bi bi-file-earmark-arrow-down me-2"></i> Laporan PDF</a>
    <a href="{{ route('kalender.index') }}"><i class="bi bi-calendar3 me-2"></i> Kalender</a>
    <a href="{{ route('bantuan.index') }}"><i class="bi bi-question-circle me-2"></i> Bantuan</a>
</div>

<!-- Main Content -->
<div class="content" id="main-content">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="glass-card">
        @yield('content')

        <!-- Live Clock -->
        <div class="glass-clock mt-4">
            <div id="clock" class="fw-bold" style="font-size: 20px;"></div>
            <div id="date" style="font-size: 14px;"></div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center mt-4 mb-3" style="font-size: 13px; color: #64748b; opacity: 0.8;">
        © {{ now()->year }} • 
        <a href="https://winnicode.com" target="_blank" style="color: #0ea5e9; text-decoration: underline;">
            Kunjungi Website Perusahaan
        </a>
    </footer>
</div>

<!-- FPS Meter -->
<div class="fps-meter" id="fps">FPS: --</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function updateClock() {
        const now = new Date();
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const h = String(now.getHours()).padStart(2, '0');
        const m = String(now.getMinutes()).padStart(2, '0');
        const s = String(now.getSeconds()).padStart(2, '0');
        const d = days[now.getDay()];
        const tgl = now.getDate();
        const bln = months[now.getMonth()];
        const th = now.getFullYear();

        document.getElementById("clock").textContent = `${h}:${m}:${s}`;
        document.getElementById("date").textContent = `${d}, ${tgl} ${bln} ${th}`;
    }

    setInterval(updateClock, 1000);
    updateClock();
</script>

<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Sukses!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 2500
        });
    @endif

    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 2500
        });
    @endif
</script>

<script>
    const themeToggle = document.getElementById('theme-toggle');
    const body = document.body;

    function applyTheme(mode) {
        if (mode === 'dark') {
            body.classList.add('dark-mode');
            themeToggle.innerHTML = '<i class="bi bi-brightness-high-fill me-1"></i> Light Mode';
        } else {
            body.classList.remove('dark-mode');
            themeToggle.innerHTML = '<i class="bi bi-moon-fill me-1"></i> Dark Mode';
        }
    }

    themeToggle.addEventListener('click', () => {
        const isDark = body.classList.contains('dark-mode');
        const newMode = isDark ? 'light' : 'dark';
        localStorage.setItem('theme', newMode);
        applyTheme(newMode);
    });

    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);
</script>

<script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('main-content');
    const toggleSidebarBtn = document.getElementById('toggle-sidebar');

    toggleSidebarBtn.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        content.classList.toggle('full-width');
    });
</script>

<script>
    const fpsDisplay = document.getElementById("fps");
    let lastFrameTime = performance.now();
    let frames = 0;

    function updateFPS() {
        const now = performance.now();
        frames++;
        if (now - lastFrameTime >= 1000) {
            fpsDisplay.textContent = `FPS: ${frames}`;
            frames = 0;
            lastFrameTime = now;
        }
        requestAnimationFrame(updateFPS);
    }

    requestAnimationFrame(updateFPS);
</script>

@stack('scripts')
</body>
</html>
