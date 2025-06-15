@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h4>Formulir Absensi</h4>
        <form method="POST" action="{{ route('qr.scan.store') }}">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Jabatan</label>
                <input type="text" name="jabatan" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>
@endsection
