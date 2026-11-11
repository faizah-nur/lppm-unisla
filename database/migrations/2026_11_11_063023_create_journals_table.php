
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('journals', function (Blueprint $table) {
            $table->id();

            // Relasi dengan portal sumber
            $table->foreignId('journal_source_id')
                ->nullable()
                ->constrained('journal_sources')
                ->nullOnDelete();

            // Identitas jurnal
            $table->string('title');
            $table->string('slug')->unique();

            // Identitas ISSN
            $table->string('p_issn', 30)->nullable();
            $table->string('e_issn', 30)->nullable();

            // Informasi jurnal
            $table->string('publisher')->nullable();
            $table->longText('description')->nullable();
            $table->text('cover_url')->nullable();
            $table->text('website_url')->nullable();

            // Informasi SINTA
            $table->string('sinta_id')->nullable()->unique();
            $table->string('sinta_rank', 20)->nullable();
            $table->text('sinta_url')->nullable();

            // Asal metadata
            $table->string('metadata_source', 30)->nullable();

            // Pengelolaan
            $table->boolean('is_active')->default(true);
            $table->timestamp('last_synced_at')->nullable();

            $table->timestamps();

            $table->index('title');
            $table->index('sinta_rank');
            $table->index('journal_source_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
