<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_registrations', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel events. Jika event dihapus, pendaftar ikut terhapus.
            $table->foreignId('event_id')->constrained()->cascadeOnDelete();

            $table->string('full_name'); // Nama Lengkap
            $table->string('nip_nidn'); // NIP/NIDN
            $table->string('email'); // Email Pendaftar

            // Status apakah sertifikat sudah dikirim atau belum
            $table->boolean('is_certified')->default(false);

            $table->timestamps();

            // Mencegah 1 email mendaftar 2 kali di event yang sama
            $table->unique(['event_id', 'email']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_registrations');
    }
};
