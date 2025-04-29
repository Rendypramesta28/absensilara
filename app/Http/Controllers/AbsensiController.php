<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Middleware auth ditambahkan agar hanya user yang login bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan semua absensi
    public function index()
    {
        $absensis = Absensi::all();
        return view('absensi.index', compact('absensis'));
    }

    // Menampilkan form untuk menambah absensi
    public function create()
    {
        return view('absensi.create');
    }

    // Menyimpan data absensi
    public function store(Request $request)
    {
        Absensi::create($request->all());

        // Tambahkan flash message
        session()->flash('success', 'Data absensi berhasil ditambahkan! 🎉');

        return redirect()->route('absensi.index');
    }

    // Menampilkan form untuk mengedit absensi berdasarkan pegawai_id
    public function edit($pegawai_id)
    {
        $absensi = Absensi::where('pegawai_id', $pegawai_id)->first();
        return view('absensi.edit', compact('absensi'));
    }

    // Mengupdate data absensi
    public function update(Request $request, $pegawai_id)
    {
        $absensi = Absensi::where('pegawai_id', $pegawai_id)->first();
        $absensi->update($request->all());

        
        // Tambahkan flash message
        session()->flash('success', 'Data absensi berhasil diperbarui! ✨');
        
        return redirect()->route('absensi.index');
    }

    // Menghapus data absensi
    public function destroy($pegawai_id)
    {
        $absensi = Absensi::where('pegawai_id', $pegawai_id)->first();
        $absensi->delete();
        return redirect()->route('absensi.index');
    }
}
