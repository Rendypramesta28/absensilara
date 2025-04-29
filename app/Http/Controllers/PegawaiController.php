<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all(); // Ambil semua data pegawai dari database
        return view('pegawai.index', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:pegawais',
            'jabatan' => 'required',
        ]);

        Pegawai::create($request->all());

        return redirect()->back()->with('success', 'Pegawai berhasil ditambahkan');
    }
}
