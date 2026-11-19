<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            
            // ==========================================
            // 1. KATEGORI UTAMA (Untuk filter dropdown)
            // ==========================================
            // Membedakan ini data Penelitian atau Pengabdian
            $table->enum('kategori_kegiatan', ['Penelitian', 'Pengabdian']);
            
            // Membedakan Hibah Internal, Eksternal DN, Internasional, Mandiri
            $table->enum('kategori_sumber', ['internal', 'eksternal_dn', 'internasional', 'mandiri'])->default('internal');

            // ==========================================
            // 2. IDENTITAS KETUA
            // ==========================================
            $table->string('sinta_id_ketua')->nullable();
            $table->string('nama_ketua');
            $table->string('nidn_ketua');
            $table->string('afiliasi_ketua')->nullable();
            $table->string('prodi_ketua')->nullable(); // Prodi tidak ada di excel, tapi bagus untuk filter
            $table->string('fakultas_ketua')->nullable(); // Fakultas tidak ada di excel, tapi bagus untuk filter
            
            // ==========================================
            // 3. DETAIL USULAN & KEGIATAN
            // ==========================================
            $table->text('judul');
            $table->string('nama_singkat_skema')->nullable();
            $table->integer('thn_pertama_usulan')->nullable();
            $table->integer('thn_usulan_kegiatan');
            $table->integer('thn_pelaksanaan_kegiatan');
            $table->integer('lama_kegiatan_tahun')->nullable();
            $table->string('bidang_fokus')->nullable();
            $table->string('nama_skema')->nullable(); // Contoh: Penelitian Dosen Pemula
            $table->string('status_usulan')->default('Submitted'); // Submitted, Didanai, Selesai
            $table->string('target_tkt')->nullable();
            $table->string('nama_program_hibah')->nullable();
            
            // ==========================================
            // 4. SUMBER DANA & KEUANGAN
            // ==========================================
            $table->string('negara_sumber_dana')->nullable();
            $table->string('sumber_dana'); // Contoh: DRTPM, Mandiri, Pribadi
            $table->decimal('dana_disetujui', 15, 2)->nullable();
            $table->string('nama_institusi_penerima_dana')->nullable();
            $table->string('link_kontrak')->nullable();

            // ==========================================
            // 5. DATA MAHASISWA (Biasanya 1 hibah 1-2 mhs)
            // ==========================================
            $table->string('nama_mahasiswa')->nullable();
            $table->string('nim_mahasiswa')->nullable();
            $table->string('prodi_mahasiswa')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grants');
    }
};