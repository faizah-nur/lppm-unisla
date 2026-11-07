<?php

namespace App\Livewire;

use App\Models\ResearchFocus;
use Livewire\Attributes\On;
use Livewire\Component;

class ResearchFocusModal extends Component
{
    public $isOpen = false;

    public $fokus = null;

    // HAPUS protected $listeners = [...];
    // Cukup gunakan #[On] di bawah ini

    #[On('open-focus-modal')]
    public function openModal($id = null)
    {
        // Menangani jika data dikirim dalam bentuk array (seperti { id: 1 })
        if (is_array($id) && isset($id['id'])) {
            $id = $id['id'];
        }

        if ($id) {
            $this->fokus = ResearchFocus::find($id);
            $this->isOpen = true;
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->fokus = null;
    }

    public function render()
    {
        return view('livewire.research-focus-modal');
    }
}
