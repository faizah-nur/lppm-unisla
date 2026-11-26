<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partnership_documents', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel partners. Jika partner dihapus, dokumen ikut terhapus.
            $table->foreignId('partner_id')->constrained('partners')->cascadeOnDelete(); 
            
            // Jenis dokumen: MoU, MoA, atau SPK
            $table->enum('type', ['MoU', 'MoA', 'SPK']); 
            
            $table->string('title'); // Judul kerja sama
            $table->string('document_number')->nullable(); // Nomor dokumen (bisa null jika belum tercatat)
            $table->date('start_date')->nullable(); // Tanggal mulai
            $table->date('end_date')->nullable(); // Tanggal berakhir
            $table->string('file_path')->nullable(); // Path file PDF dokumen
            
            // Status dokumen
            $table->enum('status', ['Aktif', 'Dalam Proses', 'Kedaluwarsa'])->default('Dalam Proses');
            
            // Untuk label "Arsip Berantai"
            $table->boolean('is_archived')->default(false); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('partnership_documents');
    }
};