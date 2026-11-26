<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Partner extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'logo_path'];

    // Relasi: Satu Partner bisa punya banyak dokumen kerjasama
    public function documents(): HasMany
    {
        return $this->hasMany(PartnershipDocument::class);
    }
}