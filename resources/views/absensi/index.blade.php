@extends('layouts.app')

@section('title', 'Data Absensi Pegawai')

@section('content')
<div class="card shadow">
    <div class="card-header bg-primary text-white text-center">
        <h3>Data Absensi Pegawai</h3>
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <a href="{{ route('absensi.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Tambah Absensi
            </a>
            <a href="{{ route('laporan.cetak') }}" class="btn btn-danger">
                <i class="bi bi-file-earmark-pdf"></i> Unduh Laporan PDF
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Pegawai</th>
                        <th>Jabatan</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $absensi->pegawai_id }}</td>
                        <td>{{ $absensi->nama }}</td>
                        <td>{{ $absensi->jabatan }}</td>
                        <td>{{ $absensi->waktu_masuk }}</td>
                        <td>
                            @if ($absensi->waktu_keluar)
                                {{ $absensi->waktu_keluar }}
                            @else
                                <span class="badge bg-danger badge-status">Belum Pulang</span>
                            @endif
                        </td>
                        <td>
                        <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('absensi.edit', $absensi) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('absensi.destroy', $absensi) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                        </form>
                    </div>
                </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
