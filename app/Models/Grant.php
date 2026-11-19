<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grant extends Model
{
    use HasFactory;

    // Mengizinkan semua kolom diisi
    protected $guarded = ['id'];

    // Relasi: Satu Hibah memiliki banyak Anggota Tim
    public function members(): HasMany
    {
        return $this->hasMany(GrantMember::class);
    }
}