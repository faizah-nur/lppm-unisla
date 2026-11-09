<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content'); // Untuk isi berita/detail
            $table->string('image')->nullable(); // Nullable karena mungkin pakai YouTube
            $table->string('youtube_url')->nullable(); // Kolom tambahan untuk link YouTube
            $table->date('published_at'); // Tanggal terbit (2024-12-15)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('informations');
    }
};
