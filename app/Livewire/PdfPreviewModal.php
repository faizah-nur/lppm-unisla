<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class PdfPreviewModal extends Component
{
    public $isOpen = false;

    public $fileUrl = null;

    public $downloadUrl = null;

    #[On('open-preview-modal')]
    public function openModal($id = null)
    {
        if (is_array($id) && isset($id['id'])) {
            $id = $id['id'];
        }

        if ($id) {
            $service = Service::find($id);

            if ($service && $service->file_path) {
                // Ambil URL file dari storage public
                $this->fileUrl = \Storage::url($service->file_path);
                $this->downloadUrl = \Storage::url($service->file_path);
                $this->isOpen = true;
            }
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->fileUrl = null;
        $this->downloadUrl = null;
    }

    public function render()
    {
        return view('livewire.pdf-preview-modal');
    }
}
