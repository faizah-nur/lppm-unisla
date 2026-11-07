<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('tagline')->nullable(); // Contoh: "RISET & INOVASI ISLAMI"
            $table->string('title'); // Contoh: "Mengintegrasikan Pengetahuan..."
            $table->text('description');
            $table->string('image')->nullable(); // Path gambar
            $table->string('btn_text')->nullable();
            $table->string('btn_link')->nullable();
            $table->integer('order')->default(0); // Untuk mengatur urutan slide
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sliders');
    }
};
