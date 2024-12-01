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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();  // Kolom id sebagai primary key
            $table->foreignId('user_id')->constrained('users');  // Kolom user_id sebagai foreign key yang mengarah ke tabel users
            $table->foreignId('product_id')->constrained('products');  // Kolom product_id sebagai foreign key yang mengarah ke tabel products
            $table->integer('quantity');  // Kolom quantity untuk jumlah produk yang ada di keranjang
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
