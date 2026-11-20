<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hki extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Casting format tanggal agar rapi saat dipanggil
    protected $casts = [
        'tanggal_publikasi' => 'date',
        'tanggal_pengajuan' => 'date',
        'tanggal_penerimaan' => 'date',
        'tanggal_sertifikat' => 'date',
    ];
}