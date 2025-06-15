<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Absensi;

class QrCodeController extends Controller
{
    public function generate()
    {
        $url = route('qr.scan.form');
        return view('qr.generate', ['qr' => QrCode::size(300)->generate($url)]);
    }

    public function scanForm()
    {
        return view('qr.scan-form');
    }

    public function storeData(Request $request)
    {
        Absensi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'waktu_masuk' => now(),
            'waktu_keluar' => null
        ]);

        return redirect()->back()->with('success', 'Absensi berhasil dicatat.');
    }
}

