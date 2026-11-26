<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;

    // Mengizinkan semua kolom diisi (Mass Assignment)
    protected $guarded = ['id'];

    // Casting tipe data agar otomatis menjadi objek Carbon (tanggal)
    protected $casts = [
        'registration_start' => 'datetime',
        'registration_end' => 'datetime',
        'event_date' => 'datetime',
    ];

    // Relasi: Satu Event memiliki banyak Pendaftar
    public function registrations(): HasMany
    {
        return $this->hasMany(EventRegistration::class);
    }
}
