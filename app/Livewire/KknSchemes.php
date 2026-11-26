<?php

namespace App\Livewire;

use App\Models\KknScheme;
use Livewire\Component;

class KknSchemes extends Component
{
    public function render()
    {
        // Ambil SEMUA skema KKN yang aktif
        $schemes = KknScheme::where('is_active', true)->get();

        return view('livewire.kkn-schemes', [
            'schemes' => $schemes
        ])->layout('layouts.app');
    }
}