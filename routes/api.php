<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\ProductSizeController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->group(function () {
    Route::post('register', [UserController::class, 'createUser']);
    Route::post('login', [UserController::class, 'loginUser']);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/add-product', [ProductController::class, 'store']);
    Route::put('/admin/product/{id}', [ProductController::class, 'update']);
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Mendapatkan semua kategori
    Route::get('{categoryId}/series', [CategoryController::class, 'getSeriesByCategory']); // Mendapatkan series berdasarkan kategori
});

Route::prefix('series')->group(function () {
    Route::get('/', [SeriesController::class, 'index']); // Mendapatkan semua series
});
Route::resource('set-size', ProductSizeController::class, 'store');
