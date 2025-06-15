@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h3>Scan QR Code untuk Absensi</h3>
        <div class="mt-3">
            {!! $qr !!}
        </div>
    </div>
@endsection
