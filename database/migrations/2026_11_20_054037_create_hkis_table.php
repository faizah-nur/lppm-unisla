<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hkis', function (Blueprint $table) {
            $table->id();
            
            // Informasi Dasar
            $table->enum('jenis_ki', ['Hak Cipta', 'Paten', 'Paten Sederhana', 'Desain Industri', 'Indikasi Geografis', 'Desain Tata Letak Sirkuit Terpadu']);
            $table->string('judul');
            $table->integer('tahun_permohonan');
            
            // Nomor & Tanggal (Nullable karena Paten dan Hak Cipta beda syarat)
            $table->string('nomor_permohonan')->nullable();
            $table->string('nomor_publikasi')->nullable();
            $table->date('tanggal_publikasi')->nullable();
            $table->date('tanggal_pengajuan')->nullable();
            $table->date('tanggal_penerimaan')->nullable();
            $table->string('nomor_sertifikat')->nullable();
            $table->date('tanggal_sertifikat')->nullable();

            // Pihak Terkait
            $table->text('pemegang_paten')->nullable(); // Bisa lebih dari 1 orang
            $table->text('inventor'); // Bisa lebih dari 1 orang
            
            // Status & Konten
            $table->string('status')->default('Dalam Proses'); // Disetujui, Tercatat, Dalam Proses
            $table->longText('abstrak')->nullable(); // Untuk halaman detail
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hkis');
    }
};