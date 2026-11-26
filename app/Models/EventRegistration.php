<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventRegistration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_certified' => 'boolean',
    ];

    // Relasi: Pendaftar ini milik satu Event
    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
