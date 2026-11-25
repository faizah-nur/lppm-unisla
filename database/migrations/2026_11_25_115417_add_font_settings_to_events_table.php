<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('events', function (Blueprint $table) {
            // Tambahkan kolom baru setelah cert_y_position
            $table->integer('cert_font_size')->default(40)->after('cert_y_position');
            $table->string('cert_font_color')->default('#000000')->after('cert_font_size');
            $table->string('cert_font_family')->default('Arial')->after('cert_font_color');
            $table->boolean('cert_font_bold')->default(false)->after('cert_font_family');
        });
    }

    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'cert_font_size',
                'cert_font_color',
                'cert_font_family',
                'cert_font_bold',
            ]);
        });
    }
};
