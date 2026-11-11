
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journal_sources', function (Blueprint $table) {
            $table->id();

            // Identitas portal jurnal
            $table->string('name');
            $table->string('source_type', 30)->default('ojs');

            // Alamat portal dan endpoint metadata
            $table->string('base_url', 500);
            $table->string('oai_endpoint', 1000)->nullable();

            // Status sumber
            $table->boolean('is_active')->default(true);

            // Informasi sinkronisasi
            $table->timestamp('last_synced_at')->nullable();
            $table->text('last_sync_message')->nullable();

            $table->timestamps();

            $table->index('source_type');
            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journal_sources');
    }
};
