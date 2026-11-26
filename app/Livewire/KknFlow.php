<?php

namespace App\Livewire;

use App\Models\KknStep;
use Livewire\Component;

class KknFlow extends Component
{
    public function render()
    {
        // Ambil langkah KKN yang aktif, urutkan berdasarkan 'order'
        $steps = KknStep::where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return view('livewire.kkn-flow', [
            'steps' => $steps
        ])->layout('layouts.app');
    }
}