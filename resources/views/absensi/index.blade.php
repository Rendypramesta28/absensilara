@extends('layouts.app')

@section('title', 'Data Absensi Pegawai')

@section('content')
<div class="glass-card">
    <div class="text-center mb-4">
        <h3 class="fw-bold text-primary">Data Absensi Pegawai</h3>
    </div>
    <div class="table-responsive">
        <table class="table align-middle text-center table-hover border rounded shadow-sm overflow-hidden">
            <thead class="text-white" style="background: linear-gradient(to right, #0ea5e9, #38bdf8);">
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
                <tr style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(6px);">
                    <td>{{ $absensi->id }}</td>
                    <td class="fw-semibold">{{ $absensi->nama }}</td>
                    <td>{{ $absensi->jabatan }}</td>
                    <td>
                        <span class="badge bg-success">
                            {{ \Carbon\Carbon::parse($absensi->waktu_masuk)->translatedFormat('l, d F Y H:i:s') }}
                        </span>
                    </td>
                    <td>
                        @if ($absensi->waktu_keluar)
                            <span class="badge bg-info text-dark">
                                {{ \Carbon\Carbon::parse($absensi->waktu_keluar)->translatedFormat('l, d F Y H:i:s') }}
                            </span>
                        @else
                            <span class="badge bg-danger">Belum Pulang</span>
                        @endif
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('absensi.edit', $absensi->id) }}" class="btn btn-outline-warning btn-sm shadow-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm shadow-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
