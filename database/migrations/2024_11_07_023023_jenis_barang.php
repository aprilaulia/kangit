<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb1_jenis_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis')->nullable(); // Ganti dengan string untuk nama jenis barang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb1_jenis_barang'); 
    }
};