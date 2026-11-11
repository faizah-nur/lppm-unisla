<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Journal extends Model
{
    protected $fillable = [
        'journal_source_id',
        'title',
        'slug',
        'p_issn',
        'e_issn',
        'publisher',
        'description',
        'cover_url',
        'website_url',
        'sinta_id',
        'sinta_rank',
        'sinta_url',
        'metadata_source',
        'is_active',
        'last_synced_at',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'last_synced_at' => 'datetime',
        ];
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(
            JournalSource::class,
            'journal_source_id'
        );
    }
}
