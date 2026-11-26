<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GrantMember extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Relasi: Anggota ini milik satu Hibah
    public function grant(): BelongsTo
    {
        return $this->belongsTo(Grant::class);
    }
}