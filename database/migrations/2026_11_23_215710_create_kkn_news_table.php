<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kkn_news', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('slug')->unique(); 
            
            // Media (Gambar atau Video)
            $table->json('images')->nullable(); // Maksimal 3 gambar (Array JSON)
            $table->string('video_url')->nullable(); // Link YouTube/Video
            
            $table->date('published_at'); 
            $table->longText('content'); 
            $table->boolean('is_active')->default(true); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kkn_news');
    }
};