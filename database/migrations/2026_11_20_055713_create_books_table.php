<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->nullable();
            $table->string('title');
            $table->text('author'); // Bisa lebih dari 1 penulis
            $table->string('category')->nullable(); // Buku Referensi, Monograf, dll
            $table->string('publisher')->nullable();
            $table->string('city')->nullable();
            $table->integer('year');
            $table->integer('pages')->nullable();
            $table->string('cover_image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};