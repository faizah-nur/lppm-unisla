<?php

namespace App\Livewire;

use App\Models\Grant;
use Livewire\Component;
use Livewire\WithPagination;

class GrantDashboard extends Component
{
    use WithPagination;

    public $kategoriKegiatan; // 'Penelitian' atau 'Pengabdian'
    public $kategoriSumber;   // 'internal', 'eksternal_dn', 'internasional', 'mandiri'
    
    public $search = '';
    public $filterTahun = '';
    public $filterStatus = '';

    public function mount($kategoriKegiatan, $kategoriSumber)
    {
        $this->kategoriKegiatan = $kategoriKegiatan;
        $this->kategoriSumber = $kategoriSumber;
    }

    // Reset halaman jika filter berubah
    public function updating($property)
    {
        if (in_array($property, ['search', 'filterTahun', 'filterStatus'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        // 1. QUERY DASAR (Sesuai Route)
        $baseQuery = Grant::where('kategori_kegiatan', $this->kategoriKegiatan)
                          ->where('kategori_sumber', $this->kategoriSumber);

        // 2. DATA UNTUK GRAFIK TREN (5 Tahun Terakhir)
        $trenData = (clone $baseQuery)
            ->selectRaw('thn_usulan_kegiatan as tahun, count(*) as total')
            ->groupBy('thn_usulan_kegiatan')
            ->orderBy('thn_usulan_kegiatan', 'asc')
            ->limit(5)
            ->get();
            
        $chartLabels = $trenData->pluck('tahun')->toArray();
        $chartValues = $trenData->pluck('total')->toArray();

        // 3. DATA UNTUK GRAFIK DONUT (Distribusi Status)
        $statusData = (clone $baseQuery)
            ->selectRaw('status_usulan, count(*) as total')
            ->groupBy('status_usulan')
            ->get();
            
        $donutLabels = $statusData->pluck('status_usulan')->toArray();
        $donutValues = $statusData->pluck('total')->toArray();

        // 4. QUERY UNTUK TABEL (Dengan Filter Tambahan)
        $grants = (clone $baseQuery)
            ->when($this->search, function ($query) {
                $query->where(function($q) {
                    $q->where('judul', 'like', '%' . $this->search . '%')
                      ->orWhere('nama_ketua', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->filterTahun, fn($q) => $q->where('thn_usulan_kegiatan', $this->filterTahun))
            ->when($this->filterStatus, fn($q) => $q->where('status_usulan', $this->filterStatus))
            ->with('members') // Eager load anggota
            ->latest('thn_usulan_kegiatan')
            ->paginate(10);

        // 5. Ambil daftar tahun untuk dropdown filter
        $availableYears = Grant::where('kategori_kegiatan', $this->kategoriKegiatan)
                               ->distinct()
                               ->orderBy('thn_usulan_kegiatan', 'desc')
                               ->pluck('thn_usulan_kegiatan');

        return view('livewire.grant-dashboard', [
            'grants' => $grants,
            'chartLabels' => $chartLabels,
            'chartValues' => $chartValues,
            'donutLabels' => $donutLabels,
            'donutValues' => $donutValues,
            'availableYears' => $availableYears,
        ])->layout('layouts.app');
    }
}