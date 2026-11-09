<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $fillable = [
        'title',
        'content',
        'image',
        'youtube_url',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];
}
