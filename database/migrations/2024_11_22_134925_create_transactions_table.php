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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();  // Kolom id sebagai primary key
            $table->foreignId('user_id')->constrained('users');  // Kolom user_id sebagai foreign key yang mengarah ke tabel users
            $table->enum('status', ['pending', 'processed', 'shipped', 'completed', 'cancelled']);  // Kolom status dengan nilai enum
            $table->decimal('total_price', 10, 2);  // Kolom total_price untuk total harga transaksi
            $table->text('shipping_address');  // Kolom shipping_address untuk alamat pengiriman
            $table->string('shipping_method');  // Kolom shipping_method untuk metode pengiriman
            $table->string('payment_method');  // Kolom payment_method untuk metode pembayaran
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
