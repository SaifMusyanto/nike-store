<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show all products (for admin)
    public function index()
    {
        // Mengambil data produk beserta relasi kategori dan series
        $products = Product::with(['category', 'series'])->get();

        // Struktur data produk dengan kategori dan series sebagai objek
        return response()->json($products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'category' => $product->category ? [
                    'id' => $product->category->id,
                    'name' => $product->category->name,
                ] : null, // Pastikan kategori adalah objek atau null
                'series' => $product->series ? [
                    'id' => $product->series->id,
                    'name' => $product->series->name,
                ] : null, // Pastikan series adalah objek atau null
                'image' => $product->image,
            ];
        }));
    }

    // Store a new product
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'tag' => 'required|in:Trending,Bestseller,Popular',
            'category_id' => 'required|exists:categories,id',
            'series_id' => 'nullable|exists:series,id',
            'image' => 'nullable|image|max:4096',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        // Create the new product with size_id reference
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'tag' => $validatedData['tag'],
            'category_id' => $validatedData['category_id'],
            'series_id' => $validatedData['series_id'],
            'image' => $validatedData['image'],
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Product added successfully!',
            'product' => $product,
        ]);
    }

    // Update product details
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric',
            'tag' => 'sometimes|required|in:Trending,Bestseller,Popular',
            'category_id' => 'sometimes|required|exists:categories,id',
            'series_id' => 'nullable|exists:series,id',
            'image' => 'nullable|image|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $path;
        }

        // Update product details
        $product->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Product updated successfully!',
            'product' => $product,
        ]);
    }


    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'status' => true,
            'message' => 'Product deleted successfully!',
        ]);
    }
}
