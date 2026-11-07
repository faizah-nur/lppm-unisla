<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResearchFocus extends Model
{
    use HasFactory;

    protected $table = 'research_focuses';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'image',
        'is_featured',
        'order',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];
}
