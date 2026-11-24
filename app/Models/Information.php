<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $table = 'informations';

    protected $guarded = ['id'];

    protected $casts = [
        'published_at' => 'date',
        'images' => 'array',
    ];

    protected static function booted(): void
    {
        static::saving(function ($information) {
            $images = $information->images;

            if (is_string($images)) {
                $images = json_decode($images, true);
            }

            if (!empty($images) && is_array($images) && count($images) > 0) {
                // Ambil gambar pertama menggunakan array_values (aman tanpa pass-by-reference)
                $values = array_values($images);
                $first = $values[0] ?? null;
                $firstPath = is_array($first) ? ($first['path'] ?? null) : $first;

                // Sinkronkan ke kolom image tunggal untuk backward compatibility
                $information->image = $firstPath;
            } elseif (empty($images) && !empty($information->image)) {
                // Jika images kosong namun image tunggal terisi, bungkus ke array
                $information->images = [$information->image];
            }
        });
    }

    /**
     * Mengambil seluruh daftar gambar dokumentasi dalam bentuk array path bersih.
     */
    public function getAllImagesAttribute(): array
    {
        $list = [];

        $images = $this->images;
        if (is_string($images)) {
            $images = json_decode($images, true);
        }

        if (!empty($images) && is_array($images)) {
            foreach ($images as $img) {
                $path = is_array($img) ? ($img['path'] ?? null) : $img;
                if ($path && !in_array($path, $list)) {
                    $list[] = $path;
                }
            }
        }

        if (empty($list) && !empty($this->image)) {
            $list[] = $this->image;
        }

        return $list;
    }

    /**
     * Mengambil path gambar utama / cover pertama.
     */
    public function getFirstImageAttribute(): ?string
    {
        $images = $this->all_images;
        return $images[0] ?? $this->image;
    }
}
