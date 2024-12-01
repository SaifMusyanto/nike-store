<?php

namespace App\Http\Controllers;

use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    // Store a new product size
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'size' => 'required|string',
            'stock' => 'required|integer',
        ]);

        // Create the product size
        $productSize = ProductSize::create([
            'size' => $validatedData['size'],
            'stock' => $validatedData['stock'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product size added successfully!',
            'product_size' => $productSize,
        ]);
    }

    // List all product sizes
    public function index()
    {
        $sizes = ProductSize::with('product')->get();

        return response()->json($sizes);
    }
}
