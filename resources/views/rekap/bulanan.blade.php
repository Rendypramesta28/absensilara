@extends('layouts.app')

@section('title', 'Rekap Bulanan')

@section('content')
<h4>Rekap Absensi Bulanan</h4>

<form method="GET" class="row g-3 mb-3">
    <div class="col-auto">
        <input type="number" name="bulan" class="form-control" placeholder="Bulan (01-12)" value="{{ $bulan }}">
    </div>
    <div class="col-auto">
        <input type="number" name="tahun" class="form-control" placeholder="Tahun" value="{{ $tahun }}">
    </div>
    <div class="col-auto">
        <button class="btn btn-primary">Tampilkan</button>
    </div>
</form>

<table class="table table-bordered text-center">
    <thead class="table-dark">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Tanggal</th>
            <th>Waktu Masuk</th>
            <th>Waktu Keluar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $absensi)
        <tr>
            <td>{{ $absensi->nama }}</td>
            <td>{{ $absensi->jabatan }}</td>
            <td>{{ \Carbon\Carbon::parse($absensi->waktu_masuk)->format('d-m-Y') }}</td>
            <td>{{ $absensi->waktu_masuk }}</td>
            <td>{{ $absensi->waktu_keluar ?? '-' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
