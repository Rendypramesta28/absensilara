@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h4 class="text-center">Tambah Data Absensi</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('absensi.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                <label for="nama" class="form-label">Nama Pegawai</label>
                 <input type="text" name="nama" class="form-control" required placeholder="Masukkan Nama Pegawai">
        </div>

            <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required placeholder="Masukkan Jabatan Pegawai">
        </div>


                <div class="mb-3">
                    <label for="waktu_masuk" class="form-label">Waktu Masuk</label>
                    <input type="datetime-local" name="waktu_masuk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="waktu_keluar" class="form-label">Waktu Keluar</label>
                    <input type="datetime-local" name="waktu_keluar" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('absensi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
