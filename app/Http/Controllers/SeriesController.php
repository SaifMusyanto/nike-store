<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\JsonResponse;

class SeriesController extends Controller
{
    /**
     * Get all series.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $series = Series::all(); // Ambil semua series
        return response()->json($series);
    }
}
