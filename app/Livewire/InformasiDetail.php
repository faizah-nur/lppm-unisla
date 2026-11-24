<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class InformasiDetail extends Component
{
    public $information;

    public $activeMedia; // Menyimpan media yang sedang tampil ['type' => 'image'|'video', 'url' => '...']

    public $mediaList = []; // Daftar gabungan gambar dokumentasi dan video YouTube

    public function mount($id)
    {
        $this->loadData($id);
    }

    /**
     * Memuat data detail informasi dan menyiapkan galeri media
     */
    public function loadData($id)
    {
        $this->information = Information::findOrFail($id);
        $this->mediaList = [];

        // Kumpulkan semua gambar dokumentasi (maksimal 3)
        if (!empty($this->information->all_images)) {
            foreach ($this->information->all_images as $path) {
                if ($path) {
                    $this->mediaList[] = [
                        'type' => 'image',
                        'url' => $path,
                    ];
                }
            }
        }

        // Tambahkan video YouTube jika tersedia
        if (!empty($this->information->youtube_url)) {
            $this->mediaList[] = [
                'type' => 'video',
                'url' => $this->information->youtube_url,
            ];
        }

        // Set media aktif default (media pertama)
        $this->activeMedia = count($this->mediaList) > 0 ? $this->mediaList[0] : null;
    }

    /**
     * Mengubah media aktif saat pengguna mengklik thumbnail gambar atau video
     */
    public function setActiveMedia($type, $url)
    {
        $this->activeMedia = [
            'type' => $type,
            'url' => $url,
        ];
    }

    public function render()
    {
        // Ambil 3 informasi & kegiatan lainnya yang terbaru (selain yang sedang dibuka)
        $otherInformations = Information::where('id', '!=', $this->information->id)
            ->orderBy('published_at', 'desc')
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

        return view('livewire.informasi-detail', [
            'otherInformations' => $otherInformations,
        ])->layout('layouts.app');
    }
}
