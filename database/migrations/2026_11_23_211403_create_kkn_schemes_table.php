<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kkn_schemes', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Nama Skema (KKN Reguler, KKN Internasional)
            $table->text('description'); // Deskripsi lengkap
            $table->text('requirements')->nullable(); // Persyaratan (Rich Editor)
            $table->string('duration')->nullable(); // Durasi (misal: 1 Bulan / 45 Hari)
            $table->string('location')->nullable(); // Lokasi (misal: Desa Binaan / Luar Negeri)
            $table->string('registration_url')->nullable(); // Link Pendaftaran (Opsional)
            $table->boolean('is_active')->default(true); // Status tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kkn_schemes');
    }
};