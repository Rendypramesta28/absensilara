@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h3>QR Code Absensi</h3>
    <div>{!! $qrCode !!}</div>
</div>
@endsection
