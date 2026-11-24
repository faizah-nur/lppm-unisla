<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KknNews extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'date',
        'is_active' => 'boolean',
        'images' => 'array', // Cast JSON ke Array
    ];

    protected static function booted()
    {
        static::saving(function ($news) {
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->title) . '-' . time();
            }
        });
    }

    // Mengambil gambar pertama sebagai cover untuk Card
    public function getCoverImageAttribute()
    {
        if (empty($this->images) || !is_array($this->images)) {
            return null;
        }
        
        $firstImage = $this->images[0];
        
        // Filament menyimpannya sebagai string path atau array of objects
        return is_array($firstImage) ? ($firstImage['path'] ?? null) : $firstImage;
    }
}