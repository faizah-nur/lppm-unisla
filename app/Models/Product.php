<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'creation_date' => 'date',
        'is_active' => 'boolean',
        'images' => 'array', // Memastikan data JSON otomatis jadi array
    ];

    // Fungsi untuk mengambil path gambar cover (gambar pertama)
    public function getCoverImageAttribute()
    {
        if (!empty($this->images)) {
            $images = is_array($this->images) ? $this->images : json_decode($this->images, true);
            if (is_array($images) && count($images) > 0) {
                $firstImage = $images[0];

                if (is_array($firstImage) && isset($firstImage['path'])) {
                    return $firstImage['path'];
                }

                if (is_string($firstImage)) {
                    return $firstImage;
                }
            }
        }

        return $this->attributes['image_path'] ?? null;
    }

    protected static function booted(): void
    {
        static::saving(function ($product) {
            // Sinkronkan gambar pertama ke image_path untuk kompatibilitas penuh
            if (!empty($product->images)) {
                $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                if (is_array($images) && count($images) > 0) {
                    $first = $images[0];
                    $product->image_path = is_array($first) ? ($first['path'] ?? null) : $first;
                }
            } elseif (!empty($product->image_path) && empty($product->images)) {
                // Jika diinput lewat kolom image_path, sinkronkan ke images
                $product->images = [$product->image_path];
            }
        });
    }
}