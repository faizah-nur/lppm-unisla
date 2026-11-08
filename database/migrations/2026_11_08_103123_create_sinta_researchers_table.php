<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sinta_researchers', function (Blueprint $table) {
            $table->id();
            $table->string('sinta_id')->unique(); // ID unik dari SINTA
            $table->string('name');
            $table->string('study_program')->nullable(); // Program Studi
            $table->string('affiliation')->nullable();

            // Skor dan Indeks
            $table->integer('sinta_score_3yr')->default(0);
            $table->integer('sinta_score_overall')->default(0);

            $table->integer('scopus_hindex')->default(0);
            $table->integer('gs_hindex')->default(0);
            $table->integer('sinta_hindex')->default(0); // H-Index SINTA jika ada

            $table->string('image_url')->nullable(); // URL foto profil
            $table->string('profile_url')->nullable(); // URL profil SINTA

            // Status Sinkronisasi
            $table->timestamp('last_synced_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinta_researchers');
    }
};
