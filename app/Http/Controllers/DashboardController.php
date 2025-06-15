<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah absen masuk hari ini (waktu_masuk tidak null)
        $hadir = Absensi::whereDate('waktu_masuk', date('Y-m-d'))->count();

        // Hitung jumlah absen pulang hari ini (waktu_keluar tidak null)
        $pulang = Absensi::whereDate('waktu_keluar', date('Y-m-d'))->count();

        // Total absensi hari ini
        $total = Absensi::whereDate('waktu_masuk', date('Y-m-d'))->count();

        return view('dashboard.index', compact('hadir', 'pulang', 'total'));
    }
}
