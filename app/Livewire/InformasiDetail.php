<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;

class InformasiDetail extends Component
{
    public $information;

    // Menangkap ID dari URL
    public function mount($id)
    {
        $this->information = Information::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.informasi-detail')->layout('layouts.app');
    }
}
