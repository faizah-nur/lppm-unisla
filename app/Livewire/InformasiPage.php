<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class InformasiPage extends Component
{
    public function render()
    {
        // Ambil data informasi terbaru
        $informations = Information::orderBy('published_at', 'desc')->get();

        return view('livewire.informasi-page', [
            'informations' => $informations,
        ])->layout('layouts.app');
    }
}
