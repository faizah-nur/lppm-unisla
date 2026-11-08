<?php

namespace App\Livewire;

use App\Models\SintaResearcher;
use Livewire\Component;
use Livewire\WithPagination;

class ResearcherList extends Component
{
    use WithPagination;

    public $search = '';

    // Reset halaman pagination saat mencari
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // Query data peneliti dengan pencarian dan urutan skor
        $researchers = SintaResearcher::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                    ->orWhere('study_program', 'like', '%'.$this->search.'%');
            })
            ->orderBy('sinta_score_3yr', 'desc')
            ->paginate(12); // Tampilkan 12 per halaman

        // Hitung statistik untuk hero section
        $totalResearchers = SintaResearcher::count();
        $totalScopus = SintaResearcher::where('scopus_hindex', '>', 0)->count();
        $totalGS = SintaResearcher::where('gs_hindex', '>', 0)->count();

        // Rata-rata skor SINTA 3Yr (dibulatkan)
        $avgSintaScore = round(SintaResearcher::avg('sinta_score_3yr') ?? 0);

        // Skor SINTA 3Yr tertinggi dari seluruh peneliti di database (untuk acuan skala progress bar universal)
        $maxSintaScore = max(1, SintaResearcher::max('sinta_score_3yr') ?? 1);

        return view('livewire.researcher-list', [
            'researchers' => $researchers,
            'totalResearchers' => $totalResearchers,
            'totalScopus' => $totalScopus,
            'totalGS' => $totalGS,
            'avgSintaScore' => $avgSintaScore,
            'maxSintaScore' => $maxSintaScore,
        ])->layout('layouts.app'); // Gunakan layout utama
    }
}
