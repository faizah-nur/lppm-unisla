<?php

namespace App\Livewire;

use App\Models\Hki;
use Livewire\Component;

class HkiDetail extends Component
{
    public $hki;

    public function mount($id)
    {
        // Ambil data HKI berdasarkan ID, jika tidak ada tampilkan 404
        $this->hki = Hki::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.hki-detail')->layout('layouts.app');
    }
}