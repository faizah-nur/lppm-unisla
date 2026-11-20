<?php

namespace App\Livewire;

use App\Models\Hki;
use Livewire\Component;
use Livewire\WithPagination;

class HkiDirectory extends Component
{
    use WithPagination;

    public $search = '';
    public $filterJenis = '';

    // Reset halaman jika filter berubah
    public function updating($property)
    {
        if (in_array($property, ['search', 'filterJenis'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        // Hitung total untuk label di header (Hak Cipta & Paten)
        $totalHakCipta = Hki::where('jenis_ki', 'Hak Cipta')->count();
        $totalPaten = Hki::whereIn('jenis_ki', ['Paten', 'Paten Sederhana'])->count();

        // Query utama
        $hkis = Hki::when($this->search, function ($query) {
                $query->where('judul', 'like', '%' . $this->search . '%')
                      ->orWhere('inventor', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterJenis, fn($q) => $q->where('jenis_ki', $this->filterJenis))
            ->latest('tahun_permohonan')
            ->paginate(9); // 9 card per halaman (3x3 grid)

        return view('livewire.hki-directory', [
            'hkis' => $hkis,
            'totalHakCipta' => $totalHakCipta,
            'totalPaten' => $totalPaten,
        ])->layout('layouts.app');
    }
}