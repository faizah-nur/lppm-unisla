<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('category'); 
            $table->date('creation_date'); 
            $table->string('creator'); 
            $table->text('description'); 
            
            // UBAH BARIS INI: dari string menjadi json
            $table->json('images')->nullable(); 
            
            $table->string('link_url')->nullable(); 
            $table->boolean('is_active')->default(true); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};