<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $activeImage; // Properti untuk menyimpan gambar yang sedang tampil

    public function mount($id)
    {
        // Ambil data produk
        $this->product = Product::where('is_active', true)->findOrFail($id);
        
        // Set gambar awal (default) ke cover
        $this->activeImage = $this->product->cover_image;
    }

    // Fungsi untuk mengubah gambar aktif saat thumbnail diklik
    public function setActiveImage($path)
    {
        $this->activeImage = $path;
    }

    public function render()
    {
        return view('livewire.product-detail')->layout('layouts.app');
    }
}