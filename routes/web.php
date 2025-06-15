<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\QrCodeController;

// ========== ROUTES PUBLIK ========== //

// Halaman Login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/')->with('success', 'Anda telah logout.');
})->name('logout');

// Halaman Bantuan (tanpa login)
Route::get('/bantuan', function () {
    return view('bantuan.index');
})->name('bantuan.index');

// Halaman Performance Test (opsional)
Route::get('/performance', function () {
    return view('performance');
});


// ========== ROUTES TERPROTEKSI (LOGIN DULU) ========== //

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Data Absensi CRUD
    Route::resource('absensi', AbsensiController::class);

    // Kalender
    Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');

    // Laporan PDF
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetakPDF'])->name('laporan.cetak');

    // Rekap Bulanan
    Route::get('/rekap-bulanan', [RekapController::class, 'index'])->name('rekap.bulanan');

    // QR Code Generator + Scan
    Route::get('/generate-qr', [QrCodeController::class, 'generate'])->name('qr.generate');
    Route::get('/scan-result', [QrCodeController::class, 'scanForm'])->name('qr.scan.form');
    Route::post('/scan-result', [QrCodeController::class, 'storeData'])->name('qr.scan.store');
});
