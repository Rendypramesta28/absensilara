<?php

// Import Controller
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KalenderController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route untuk login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route untuk logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login')->with('success', 'Anda telah logout.');
})->name('logout');

// Route untuk bantuan
Route::get('/bantuan', function () {
    return view('bantuan.index');
})->name('bantuan.index');

// routes/web.php untuk perfomance
Route::get('/performance', function () {
    return view('performance');
});


// Route yang dibatasi aksesnya dengan middleware auth
Route::middleware('auth')->group(function () {
    // Dashboard Statistik
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Absensi CRUD
    Route::resource('absensi', AbsensiController::class);

    // Kalender Digital
    Route::get('/kalender', [KalenderController::class, 'index'])->name('kalender.index');

    // Laporan PDF
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetakPDF'])->name('laporan.cetak');

    // Rekap Bulanan
    Route::get('/rekap-bulanan', [RekapController::class, 'index'])->name('rekap.bulanan');
    
});

