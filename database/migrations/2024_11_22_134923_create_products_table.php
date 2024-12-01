<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();  // Kolom ID sebagai primary key
            $table->string('name');  // Kolom name (string)
            $table->text('description');  // Kolom description (text)
            $table->decimal('price', 10, 2);  // Kolom price (decimal)
            $table->enum('tag', ['Trending', 'Bestseller', 'Popular']); //tag
            $table->foreignId('category_id')->constrained('categories');  // Kolom category_id sebagai foreign key yang mengarah ke tabel categories
            $table->foreignId('series_id')->constrained('series');
            $table->string('image');  // Kolom image (string) untuk path file gambar
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
