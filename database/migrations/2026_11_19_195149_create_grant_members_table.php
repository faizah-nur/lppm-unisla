<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grant_members', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke tabel utama. Jika hibah dihapus, anggota ikut terhapus.
            $table->foreignId('grant_id')->constrained('grants')->cascadeOnDelete();
            
            $table->string('sinta_id')->nullable();
            $table->string('nidn');
            $table->string('nama');
            
            // Untuk menandai ini member ke-1, ke-2, dst (sesuai urutan di Excel)
            $table->integer('urutan')->default(1); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grant_members');
    }
};