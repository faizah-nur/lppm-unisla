<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Services\SiakadService;
use Livewire\Component;

class EventRegister extends Component
{
    public $event;

    public $full_name = '';

    public $nip_nidn = '';

    public $email = '';

    public $isNidnValid = null;

    public $nidnMessage = '';

    public function mount($eventId)
    {
        $this->event = Event::findOrFail($eventId);
        if (now()->gt($this->event->registration_end)) {
            abort(403, 'Pendaftaran untuk event ini sudah ditutup.');
        }
    }

    public function checkNidn(SiakadService $siakad)
    {
        if (empty($this->nip_nidn)) {
            $this->isNidnValid = null;
            $this->nidnMessage = '';

            return;
        }

        // 1. Cek dulu apakah NIDN sudah terdaftar di event ini
        $isRegistered = EventRegistration::where('event_id', $this->event->id)
            ->where('nip_nidn', $this->nip_nidn)
            ->exists();

        if ($isRegistered) {
            $this->isNidnValid = false;
            $this->nidnMessage = 'NIDN ini sudah terdaftar sebagai peserta di event ini.';
            $this->addError('nip_nidn', $this->nidnMessage);

            return;
        }

        // 2. Jika belum, validasi ke SIAKAD
        $result = $siakad->validateDosen($this->nip_nidn);

        if ($result['status'] === true) {
            $this->isNidnValid = true;
            $this->nidnMessage = 'NIDN Valid: '.$result['nama'];
            if (empty($this->full_name)) {
                $this->full_name = $result['nama'];
            }
        } elseif ($result['status'] === 'error') {
            $this->isNidnValid = 'error';
            $this->nidnMessage = $result['message'];
            $this->addError('nip_nidn', $result['message']);
        } else {
            $this->isNidnValid = false;
            $this->nidnMessage = $result['message'];
            $this->addError('nip_nidn', $result['message']);
        }
    }

    public function register(SiakadService $siakad)
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'nip_nidn' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        // 3. Validasi Ganda: Cek ulang duplikasi NIDN (jaga-jaga jika user bypass realtime check)
        $isNidnRegistered = EventRegistration::where('event_id', $this->event->id)
            ->where('nip_nidn', $this->nip_nidn)
            ->exists();

        if ($isNidnRegistered) {
            $this->addError('nip_nidn', 'NIDN ini sudah terdaftar sebagai peserta di event ini.');

            return;
        }

        // Validasi ketat NIDN (SIAKAD)
        if ($this->isNidnValid !== true) {
            $result = $siakad->validateDosen($this->nip_nidn);
            if ($result['status'] !== true) {
                $this->addError('nip_nidn', $result['message']);

                return;
            }
        }

        // Cek duplikasi email
        $exists = EventRegistration::where('event_id', $this->event->id)
            ->where('email', $this->email)
            ->exists();
        if ($exists) {
            $this->addError('email', 'Email ini sudah terdaftar di event ini.');

            return;
        }

        EventRegistration::create([
            'event_id' => $this->event->id,
            'full_name' => $this->full_name,
            'nip_nidn' => $this->nip_nidn,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Pendaftaran berhasil! Silakan cek email Anda secara berkala.');
        $this->reset(['full_name', 'nip_nidn', 'email', 'isNidnValid', 'nidnMessage']);
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.event-register')->layout('layouts.app');
    }
}
