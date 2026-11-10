<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class LayananPage extends Component
{
    public function render()
    {
        // Ambil semua data, urutkan berdasarkan urutan (order), lalu kelompokkan berdasarkan kategori
        $services = Service::orderBy('order', 'asc')->get()->groupBy('category');

        return view('livewire.layanan-page', [
            'services' => $services,
        ])->layout('layouts.app');
    }
}
