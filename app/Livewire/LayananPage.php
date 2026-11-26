<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class LayananPage extends Component
{
    public $search = '';
    public $filterCategory = '';
    public $filterYear = '';

    public function setCategory($category)
    {
        $this->filterCategory = $category;
    }

    public function setYear($year)
    {
        $this->filterYear = $year;
    }

    public function render()
    {
        // 1. Ambil semua tahun yang unik untuk filter
        $availableYears = Service::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');
        
        // 2. Ambil semua kategori unik untuk filter
        $availableCategories = Service::select('category')->distinct()->pluck('category');

        // 3. Query data berdasarkan filter
        $servicesQuery = Service::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->when($this->filterYear, fn($q) => $q->where('year', $this->filterYear))
            ->orderBy('order', 'asc')
            ->get();

        // 4. Kelompokkan berdasarkan kategori untuk tampilan
        $services = $servicesQuery->groupBy('category');

        return view('livewire.layanan-page', [
            'services' => $services,
            'availableYears' => $availableYears,
            'availableCategories' => $availableCategories,
        ])->layout('layouts.app');
    }
}