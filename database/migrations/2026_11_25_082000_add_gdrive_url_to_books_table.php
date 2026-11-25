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
        if (Schema::hasTable('books') && !Schema::hasColumn('books', 'gdrive_url')) {
            Schema::table('books', function (Blueprint $table) {
                $table->string('gdrive_url')->nullable()->after('cover_image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('books') && Schema::hasColumn('books', 'gdrive_url')) {
            Schema::table('books', function (Blueprint $table) {
                $table->dropColumn('gdrive_url');
            });
        }
    }
};
