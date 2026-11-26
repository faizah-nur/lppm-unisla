<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kkn_steps', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Langkah (cth: Pendaftaran Akun)
            $table->text('description')->nullable(); // Penjelasan detail
            $table->string('icon')->default('document-text'); // Nama ikon Heroicon (untuk tampilan)
            $table->string('order')->default(0); // Urutan langkah
            
            // File Panduan (Opsional)
            $table->string('file_path')->nullable(); // Jika upload file PDF
            $table->string('external_url')->nullable(); // Jika pakai link GDrive
            
            $table->boolean('is_active')->default(true); // Tampil atau sembunyi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kkn_steps');
    }
};