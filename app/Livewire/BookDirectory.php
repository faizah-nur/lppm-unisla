<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use Livewire\WithPagination;

class BookDirectory extends Component
{
    use WithPagination;

    public $search = '';

    public function updating($property)
    {
        if ($property === 'search') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $books = Book::when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('author', 'like', '%' . $this->search . '%')
                      ->orWhere('isbn', 'like', '%' . $this->search . '%');
            })
            ->latest('year')
            ->paginate(12); // 12 Buku per halaman (4x3 grid)

        return view('livewire.book-directory', [
            'books' => $books
        ])->layout('layouts.app');
    }
}