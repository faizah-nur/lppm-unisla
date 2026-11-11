<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JournalSource extends Model
{
    protected $fillable = [
        'name',
        'source_type',
        'base_url',
        'oai_endpoint',
        'is_active',
        'last_synced_at',
        'last_sync_message',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'last_synced_at' => 'datetime',
        ];
    }

    public function journals(): HasMany
    {
        return $this->hasMany(Journal::class);
    }
}
