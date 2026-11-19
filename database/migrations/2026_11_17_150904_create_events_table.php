<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Event
            $table->text('description'); // Deskripsi Event
            $table->string('poster_path'); // Gambar/Brosur Event

            // Tanggal Pendaftaran
            $table->dateTime('registration_start');
            $table->dateTime('registration_end');

            // Tanggal Pelaksanaan Event
            $table->dateTime('event_date');

            $table->string('location')->nullable(); // Lokasi (Opsional)

            // Kolom untuk Sertifikat
            $table->string('certificate_template_path')->nullable(); // Path gambar template sertifikat kosong
            $table->integer('cert_x_position')->default(500); // Posisi X teks nama di sertifikat
            $table->integer('cert_y_position')->default(400); // Posisi Y teks nama di sertifikat

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
