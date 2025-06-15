<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Login - Sistem Absensi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow: hidden;
            position: relative;
            background: linear-gradient(to right, #4e54c8, #8f94fb);
        }

        /* Background animasi partikel */
        .background-animation {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            top: 0;
            left: 0;
            z-index: 0;
        }

        .circle {
            position: absolute;
            bottom: -150px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 50%;
            animation: rise 25s linear infinite;
        }

        @keyframes rise {
            0% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
            100% {
                transform: translateY(-1000px) scale(0.5);
                opacity: 0;
            }
        }

        /* Marquee berjalan otomatis */
        .marquee-container {
            position: absolute;
            top: 10px;
            width: 100%;
            overflow: hidden;
            z-index: 2;
        }

        .marquee-text {
            white-space: nowrap;
            display: inline-block;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        .card {
            position: relative;
            z-index: 2;
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
            animation: fadeInUp 1s ease forwards;
            opacity: 0;
            transform: translateY(30px);
            background: #ffffffcc;
            backdrop-filter: blur(10px);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #4e54c8;
            border-color: #4e54c8;
        }

        .btn-primary:hover {
            background-color: #3c41b8;
        }

        /* Tombol Uji Performa pojok kiri bawah */
        .btn-performance {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
            background-color: #4e54c8;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-decoration: none;
            transition: background-color 0.3s ease;
            user-select: none;
        }

        .btn-performance:hover {
            background-color: #3c41b8;
        }
    </style>
</head>
<body>

    {{-- Latar belakang animasi partikel --}}
    <div class="background-animation">
        @for ($i = 0; $i < 20; $i++)
            <div class="circle" style="
                width: {{ rand(30, 80) }}px;
                height: {{ rand(30, 80) }}px;
                left: {{ rand(0, 100) }}%;
                animation-delay: {{ rand(0, 20) }}s;
            "></div>
        @endfor
    </div>

    {{-- Teks berjalan otomatis --}}
    <div class="marquee-container">
        <div class="marquee-text">
            Selamat datang di Aplikasi Sistem Absensi Pegawai | Aplikasi Ini Didevelop Oleh Rendy Pramesta Syah
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0">Selamat Datang!</h4>
                    </div>
                    <div class="card-body p-4">
                        {{-- Flash Error Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{ url('/login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan email" required autofocus />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required />
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center text-muted py-2">
                        &copy; {{ date('Y') }} Sistem Absensi
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Uji Performa -->
    <a href="{{ url('/performance') }}" class="btn-performance" title="Uji Performa Sistem">
        Uji Performa
    </a>

    {{-- Script Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
