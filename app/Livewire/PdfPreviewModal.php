<?php

namespace App\Livewire;

use App\Models\KknStep;
use App\Models\PartnershipDocument;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class PdfPreviewModal extends Component
{
    public $isOpen = false;

    public $fileUrl = null;

    public $downloadUrl = null;

    public $title = 'Pratinjau Dokumen';

    #[On('open-preview-modal')]
    public function openModal($id = null, $type = null, $url = null, $title = null, $downloadUrl = null)
    {
        if (is_array($id)) {
            $type = $id['type'] ?? $type;
            $url = $id['url'] ?? $url;
            $title = $id['title'] ?? $title;
            $downloadUrl = $id['downloadUrl'] ?? $downloadUrl;
            $id = $id['id'] ?? null;
        }

        // 1. Jika URL diberikan secara eksplisit
        if ($url) {
            $this->fileUrl = $url;
            $this->downloadUrl = $downloadUrl ?? $url;
            $this->title = $title ?? 'Pratinjau Dokumen';
            $this->isOpen = true;

            return;
        }

        // 2. Jika tipe dokumen adalah partnership / kerjasama
        if ($type === 'partnership' || $type === 'partnership_document') {
            $doc = PartnershipDocument::find($id);
            if ($doc && $doc->file_path) {
                $this->fileUrl = Storage::url($doc->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($doc->file_path);
                $this->title = $title ?? $doc->title ?? 'Pratinjau Dokumen Kerjasama';
                $this->isOpen = true;

                return;
            }
        }

        // 3. Jika tipe dokumen adalah service / layanan
        if ($type === 'service') {
            $service = Service::find($id);
            if ($service && $service->file_path) {
                $this->fileUrl = Storage::url($service->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($service->file_path);
                $this->title = $title ?? $service->title ?? 'Pratinjau Dokumen Layanan';
                $this->isOpen = true;

                return;
            }
        }

        // 4. Jika tipe dokumen adalah kkn_step / kkn
        if ($type === 'kkn' || $type === 'kkn_step') {
            $step = KknStep::find($id);
            if ($step && $step->file_path) {
                $this->fileUrl = Storage::url($step->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($step->file_path);
                $this->title = $title ?? $step->title ?? 'Pratinjau Dokumen Panduan KKN';
                $this->isOpen = true;

                return;
            }
        }

        // 5. Fallback jika type tidak dispesifikasikan (cek Service, KknStep, lalu PartnershipDocument)
        if ($id) {
            $service = Service::find($id);
            if ($service && $service->file_path) {
                $this->fileUrl = Storage::url($service->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($service->file_path);
                $this->title = $title ?? $service->title ?? 'Pratinjau Dokumen';
                $this->isOpen = true;

                return;
            }

            $step = KknStep::find($id);
            if ($step && $step->file_path) {
                $this->fileUrl = Storage::url($step->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($step->file_path);
                $this->title = $title ?? $step->title ?? 'Pratinjau Dokumen';
                $this->isOpen = true;

                return;
            }

            $doc = PartnershipDocument::find($id);
            if ($doc && $doc->file_path) {
                $this->fileUrl = Storage::url($doc->file_path);
                $this->downloadUrl = $downloadUrl ?? Storage::url($doc->file_path);
                $this->title = $title ?? $doc->title ?? 'Pratinjau Dokumen';
                $this->isOpen = true;

                return;
            }
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->fileUrl = null;
        $this->downloadUrl = null;
        $this->title = 'Pratinjau Dokumen';
    }

    public function render()
    {
        return view('livewire.pdf-preview-modal');
    }
}
