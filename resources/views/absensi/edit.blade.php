@extends('layouts.app')

@section('title', 'Edit Absensi')

@section('content')
<div class="glass-card">
    <h4 class="text-center fw-bold mb-4 text-warning">
        <i class="bi bi-pencil-square me-2"></i>Edit Data Absensi
    </h4>

    <form action="{{ route('absensi.update', $absensi->id) }}" method="POST" class="row g-3">
        @csrf
        @method('PUT')

        <div class="col-md-6">
            <label for="nama" class="form-label fw-semibold">Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" value="{{ $absensi->nama }}" required>
        </div>

        <div class="col-md-6">
            <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="{{ $absensi->jabatan }}" required>
        </div>

        <div class="col-md-6">
            <label for="waktu_masuk" class="form-label fw-semibold">Waktu Masuk</label>
            <input type="datetime-local" name="waktu_masuk" class="form-control"
                   value="{{ \Carbon\Carbon::parse($absensi->waktu_masuk)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="col-md-6">
            <label for="waktu_keluar" class="form-label fw-semibold">Waktu Keluar</label>
            <input type="datetime-local" name="waktu_keluar" class="form-control"
                   value="{{ $absensi->waktu_keluar ? \Carbon\Carbon::parse($absensi->waktu_keluar)->format('Y-m-d\TH:i') : '' }}">
        </div>

        <div class="col-12 mt-3 d-flex justify-content-end gap-2">
            <a href="{{ route('absensi.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-arrow-repeat me-1"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
