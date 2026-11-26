<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PartnershipDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'partner_id',
        'type',
        'title',
        'document_number',
        'start_date',
        'end_date',
        'file_path',
        'status',
        'is_archived',
    ];

    // Casting tipe data agar otomatis menjadi format yang sesuai
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_archived' => 'boolean',
    ];

    // Relasi: Dokumen ini milik satu Partner
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }
}