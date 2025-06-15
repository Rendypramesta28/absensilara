<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    public function getPerformance()
    {
        // Dummy data, nanti diganti dengan logika sebenarnya
        $cpuUsage = rand(10, 90);
        $ramUsage = rand(10, 90);

        return response()->json([
            'cpu' => $cpuUsage,
            'ram' => $ramUsage,
        ]);
    }
}
