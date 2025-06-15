@extends('layouts.app')

@section('title', 'Dashboard Statistik Absensi')

@section('content')
<div class="glass-card">
    <h4 class="text-center fw-bold text-success mb-4">
        <i class="bi bi-bar-chart-fill me-2"></i>Dashboard Statistik Absensi Pegawai
    </h4>

    <!-- Statistik Angka -->
    <div class="row text-center g-4 mb-4">
        <div class="col-md-4">
            <div class="p-4 rounded shadow glass-box border-start border-4 border-success">
                <h2 class="text-success fw-bold">
                    <i class="bi bi-check-circle-fill me-1"></i>{{ $hadir }}
                </h2>
                <p class="mb-1 fw-semibold">Sudah Absen Masuk</p>
                <small class="text-muted">Pegawai melakukan absen masuk hari ini</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 rounded shadow glass-box border-start border-4 border-warning">
                <h2 class="text-warning fw-bold">
                    <i class="bi bi-door-open-fill me-1"></i>{{ $pulang }}
                </h2>
                <p class="mb-1 fw-semibold">Sudah Absen Pulang</p>
                <small class="text-muted">Pegawai melakukan absen pulang hari ini</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 rounded shadow glass-box border-start border-4 border-secondary">
                <h2 class="text-secondary fw-bold">
                    <i class="bi bi-clock-history me-1"></i>{{ $total }}
                </h2>
                <p class="mb-1 fw-semibold">Total Absensi Hari Ini</p>
                <small class="text-muted">Jumlah data absensi tercatat</small>
            </div>
        </div>
    </div>
@endsection

