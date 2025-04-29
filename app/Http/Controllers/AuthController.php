<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // ✅ Login berhasil
            session()->flash('success', 'Login berhasil! Selamat datang, ' . auth()->user()->name . ' 😄');
            return redirect()->intended('absensi');
        }

        // ❌ Login gagal
        return redirect()->back()->with('error', 'Email atau password salah.');
    }
}
