@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-warning text-white text-center">
            <h3>Edit Data Absensi</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('absensi.update', $absensi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pegawai</label>
                    <input type="text" name="nama" class="form-control" value="{{ $absensi->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $absensi->jabatan }}" required>
                </div>

                <div class="mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                    <input type="datetime-local" name="waktu_masuk" class="form-control" value="{{ $absensi->waktu_masuk }}" required>
                </div>

                <div class="mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                    <input type="datetime-local" name="waktu_keluar" class="form-control" value="{{ $absensi->waktu_keluar }}">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
