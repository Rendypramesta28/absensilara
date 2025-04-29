<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $absensis = Absensi::all();
        return view('laporan.index', compact('absensis'));
    }

    public function cetakPDF()
    {
        $absensis = Absensi::all();
        $pdf = PDF::loadView('laporan.pdf', compact('absensis'));
        return $pdf->download('laporan_absensi.pdf');
    }
}
