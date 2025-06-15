@extends('layouts.app')

@section('title', 'Tambah Absensi')

@section('content')
<div class="glass-card">
    <h4 class="text-center fw-bold mb-4">
        <i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Data Absensi
    </h4>

    <form action="{{ route('absensi.store') }}" method="POST" class="row g-3">
        @csrf

        <div class="col-md-6">
            <label for="nama" class="form-label fw-semibold">Nama Pegawai</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukkan nama pegawai" required>
        </div>

        <div class="col-md-6">
            <label for="jabatan" class="form-label fw-semibold">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" placeholder="Masukkan jabatan" required>
        </div>

        <div class="col-md-6">
            <label for="waktu_masuk" class="form-label fw-semibold">Waktu Masuk</label>
            <input type="datetime-local" name="waktu_masuk" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label for="waktu_keluar" class="form-label fw-semibold">Waktu Keluar</label>
            <input type="datetime-local" name="waktu_keluar" class="form-control">
        </div>

        <div class="col-12 mt-3 d-flex justify-content-end gap-2">
            <a href="{{ route('absensi.index') }}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left-circle me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save2 me-1"></i> Simpan
            </button>
        </div>
    </form>
</div>
@endsection
