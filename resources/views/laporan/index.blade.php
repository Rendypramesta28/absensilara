@extends('layouts.app')

@section('title', 'Laporan Absensi')

@section('content')
    <div class="card">
        <div class="card-header bg-success text-white text-center">
            <h4>Laporan Data Absensi Pegawai</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('laporan.cetak') }}" class="btn btn-primary mb-3">Download PDF</a>
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($absensis as $absensi)
                        <tr>
                            <td>{{ $absensi->nama }}</td>
                            <td>{{ $absensi->jabatan }}</td>
                            <td>{{ $absensi->waktu_masuk }}</td>
                            <td>{{ $absensi->waktu_keluar ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
