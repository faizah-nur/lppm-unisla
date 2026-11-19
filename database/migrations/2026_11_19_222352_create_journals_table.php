<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama Jurnal (cth: IJASC)
            $table->text('description'); // Deskripsi singkat
            $table->string('cover_image'); // Path gambar cover
            $table->string('external_url'); // Link menuju website jurnal (Kunjungi Jurnal)
            $table->boolean('is_active')->default(true); // Status tampil atau tidak
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};