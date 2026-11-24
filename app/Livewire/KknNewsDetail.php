<?php

namespace App\Livewire;

use App\Models\KknNews;
use Livewire\Component;

class KknNewsDetail extends Component
{
    public $news;

    public $activeMedia; // Menyimpan media aktif (bisa path gambar atau URL video)

    public $mediaList = []; // Array yang berisi gabungan gambar dan video

    public function mount($id)
    {
        $this->news = KknNews::where('is_active', true)->findOrFail($id);

        // Kumpulkan semua gambar
        if ($this->news->images && is_array($this->news->images)) {
            foreach ($this->news->images as $img) {
                $path = is_array($img) ? ($img['path'] ?? null) : $img;
                if ($path) {
                    $this->mediaList[] = [
                        'type' => 'image',
                        'url' => $path,
                    ];
                }
            }
        }

        // Tambahkan video jika ada
        if ($this->news->video_url) {
            $this->mediaList[] = [
                'type' => 'video',
                'url' => $this->news->video_url,
            ];
        }

        // Set media default (gambar pertama atau video pertama jika tidak ada gambar)
        if (count($this->mediaList) > 0) {
            $this->activeMedia = $this->mediaList[0];
        }
    }

    // Fungsi untuk mengubah media aktif
    public function setActiveMedia($type, $url)
    {
        $this->activeMedia = [
            'type' => $type,
            'url' => $url,
        ];
    }

    public function render()
    {
        return view('livewire.kkn-news-detail')->layout('layouts.app');
    }
}
