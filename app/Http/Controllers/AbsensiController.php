<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    // Middleware auth agar hanya user login yang bisa akses
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan semua absensi
    public function index()
    {
    $absensis = Absensi::all(); // Menampilkan semua data absensi tanpa 'pegawai_id'
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

        // Flash message
        session()->flash('success', 'Data absensi berhasil ditambahkan! 🎉');
        return redirect()->route('absensi.index');
    }

    // Menampilkan form untuk mengedit data absensi berdasarkan ID
    public function edit($id)
    {
        $absensi = Absensi::findOrFail($id);
        return view('absensi.edit', compact('absensi'));
    }

    // Mengupdate data absensi
    public function update(Request $request, $id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->update($request->all());

        session()->flash('success', 'Data absensi berhasil diperbarui! ✨');
        return redirect()->route('absensi.index');
    }

    // Menghapus data absensi
    public function destroy($id)
    {
        $absensi = Absensi::findOrFail($id);
        $absensi->delete();

        return redirect()->route('absensi.index');
    }
}
