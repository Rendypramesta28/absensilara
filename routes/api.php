<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/performance', function (Request $request) {

    return response()->json([
        'cpu' => round($cpuUsage, 2),
        'ram' => round($ramUsage, 2),
    ]);
});
