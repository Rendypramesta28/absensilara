<?php

//Absensi Controller
use App\Http\Controllers\AbsensiController;
//Login Controller
use App\Http\Controllers\AuthController;
//laporan controller
use App\Http\Controllers\LaporanController;

use Illuminate\Support\Facades\Route;

// Gunakan resource route untuk absensi
Route::resource('absensi', AbsensiController::class);

//route untuk login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

//route untuk menkonfigurasi laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/cetak', [LaporanController::class, 'cetakPDF'])->name('laporan.cetak');
