<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductDirectory extends Component
{
    use WithPagination;

    public $search = '';
    public $filterCategory = '';

    // Reset halaman saat filter berubah
    public function updating($property)
    {
        if (in_array($property, ['search', 'filterCategory'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        // Ambil kategori unik untuk dropdown filter
        $categories = Product::where('is_active', true)
            ->select('category')
            ->distinct()
            ->pluck('category');

        // Query data produk
        $products = Product::where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('creator', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->filterCategory, fn($q) => $q->where('category', $this->filterCategory))
            ->latest('creation_date')
            ->paginate(9); // 9 card per halaman (3x3 grid)

        return view('livewire.product-directory', [
            'products' => $products,
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}