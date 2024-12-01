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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();  // Kolom id sebagai primary key
            $table->foreignId('transaction_id')->constrained('transactions');  // Kolom transaction_id sebagai foreign key yang mengarah ke tabel transactions
            $table->foreignId('product_id')->constrained('products');  // Kolom product_id sebagai foreign key yang mengarah ke tabel products
            $table->integer('quantity');  // Kolom quantity untuk jumlah produk dalam transaksi
            $table->decimal('price', 10, 2);  // Kolom price untuk harga produk pada transaksi
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions_detail');
    }
};
