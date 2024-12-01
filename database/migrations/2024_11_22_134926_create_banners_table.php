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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();  // Kolom id sebagai primary key
            $table->string('title');  // Kolom title untuk judul banner
            $table->string('image');  // Kolom image untuk path ke gambar banner
            $table->string('link')->nullable();  // Kolom link untuk URL (optional), dapat bernilai null
            $table->timestamps();  // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
