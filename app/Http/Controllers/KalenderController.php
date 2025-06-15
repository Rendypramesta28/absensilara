<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
        // Hanya menampilkan view kalender digital tanpa data backend
        return view('kalender.index');
    }
}
