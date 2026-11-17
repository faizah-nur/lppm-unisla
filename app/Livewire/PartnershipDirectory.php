<?php

namespace App\Livewire;

use App\Models\PartnershipDocument;
use Livewire\Component;
use Livewire\WithPagination;

class PartnershipDirectory extends Component
{
    use WithPagination;

    public $search = '';

    public $filterType = '';

    public $filterStatus = '';

    public function updating($property)
    {
        if (in_array($property, ['search', 'filterType', 'filterStatus'])) {
            $this->resetPage();
        }
    }

    public function resetFilter()
    {
        $this->reset(['search', 'filterType', 'filterStatus']);
        $this->resetPage();
    }

    public function render()
    {
        $stats = [
            'total_linked' => PartnershipDocument::whereNotNull('file_path')->count(),
            'total_institutional' => PartnershipDocument::whereIn('type', ['MoU', 'MoA'])->count(),
            'total_active' => PartnershipDocument::where('status', 'Aktif')->count(),
            'total_publication' => 0,
            'total_processing' => PartnershipDocument::where('status', 'Dalam Proses')->count(),
        ];

        $documents = PartnershipDocument::with('partner')
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('title', 'like', '%'.$this->search.'%')
                        ->orWhere('document_number', 'like', '%'.$this->search.'%')
                        ->orWhereHas('partner', function ($subQ) {
                            $subQ->where('name', 'like', '%'.$this->search.'%');
                        });
                });
            })
            ->when($this->filterType, fn ($q) => $q->where('type', $this->filterType))
            ->when($this->filterStatus, fn ($q) => $q->where('status', $this->filterStatus))
            ->latest()
            ->paginate(12);

        return view('livewire.partnership-directory', [
            'stats' => $stats,
            'documents' => $documents,
        ])->layout('layouts.app');
    }
}
