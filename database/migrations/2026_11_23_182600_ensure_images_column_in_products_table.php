<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'images')) {
                    $table->json('images')->nullable()->after('description');
                }
                if (!Schema::hasColumn('products', 'image_path')) {
                    $table->string('image_path')->nullable()->after('description');
                }
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                // Jangan hapus kolom pada rollback untuk menjaga integritas data
            });
        }
    }
};
