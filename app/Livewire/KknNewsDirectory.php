<?php

namespace App\Livewire;

use App\Models\KknNews;
use Livewire\Component;
use Livewire\WithPagination;

class KknNewsDirectory extends Component
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
        $news = KknNews::where('is_active', true)
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                    ->orWhere('content', 'like', '%'.$this->search.'%');
            })
            ->latest('published_at')
            ->paginate(9); // 9 card per halaman

        return view('livewire.kkn-news-directory', [
            'news' => $news,
        ])->layout('layouts.app');
    }
}
