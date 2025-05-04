<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;

class RekapController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan') ?? date('m');
        $tahun = $request->get('tahun') ?? date('Y');

        $data = Absensi::whereMonth('waktu_masuk', $bulan)
                        ->whereYear('waktu_masuk', $tahun)
                        ->get();

        return view('rekap.bulanan', compact('data', 'bulan', 'tahun'));
    }
}
