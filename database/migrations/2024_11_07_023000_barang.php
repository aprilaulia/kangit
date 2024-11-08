<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tb1_barang', function (Blueprint $table) {
            $table->id();
            $table->integer('id_jenis'); // Menggunakan 'integer' untuk tipe data id_jenis
            $table->string('nama_barang')->nullable(); // Kolom nama_barang bisa null
            $table->bigInteger('harga')->unique(); // Menggunakan 'bigInteger' untuk harga
            $table->integer('stok')->nullable(); // Kolom stok bisa null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb1_barang');
    }
};
