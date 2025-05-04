<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            position: fixed;
            top: 56px; /* navbar height */
            left: 0;
            background-color: #343a40;
            padding-top: 1rem;
        }
        .sidebar a {
            color: #fff;
            padding: 10px 20px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            margin-left: 210px;
            padding: 20px;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-center">
            <a class="navbar-brand" href="#">Sistem Absensi Pegawai</a>
        </div>
    </nav>

    {{-- Sidebar --}}
    <div class="sidebar">
        <a href="{{ route('absensi.index') }}">📋 Data Absensi</a>
        <a href="{{ route('rekap.bulanan') }}">📆 Rekap Bulanan</a>
        <a href="{{ route('laporan.cetak') }}">📄 Unduh Laporan PDF</a>
    </div>

    {{-- Konten Utama --}}
    <div class="content">
        {{-- Flash Message (fallback) --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    {{-- Script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- SweetAlert2 Pop-up --}}
    <script>
        @if(session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif

        @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ session('error') }}',
                timer: 2500,
                showConfirmButton: false
            });
        @endif
    </script>
</body>
</html>
