<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    /**
     * Get all categories.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $categories = Category::all(); // Ambil semua kategori
        return response()->json($categories->map(function ($category) {
            return [
                'id' => $category->id,
                'name' => $category->name,
            ];
        }));
    }

    /**
     * Get series by category ID.
     *
     * @param int $categoryId
     * @return JsonResponse
     */
    public function getSeriesByCategory(int $categoryId): JsonResponse
    {
        $category = Category::with('series')->find($categoryId); // Cari kategori beserta series-nya
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json($category->series->map(function ($serie) {
            return [
                'id' => $serie->id,
                'name' => $serie->name,
            ];
        }));
    }
}
