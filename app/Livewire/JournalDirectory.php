<?php

namespace App\Livewire;

use App\Models\Journal;
use Livewire\Component;

class JournalDirectory extends Component
{
    public function render()
    {
        // Ambil jurnal yang aktif, urutkan dari yang terbaru
        $journals = Journal::where('is_active', true)
            ->latest()
            ->get();

        return view('livewire.journal-directory', [
            'journals' => $journals
        ])->layout('layouts.app'); // Sesuaikan dengan layout utama Anda
    }
}