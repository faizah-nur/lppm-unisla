<?php

namespace App\Livewire;

use App\Models\Event;
use App\Models\EventRegistration;
use Livewire\Component;

class EventRegister extends Component
{
    public $event;

    public $full_name = '';

    public $nip_nidn = '';

    public $email = '';

    // Mount dijalankan saat halaman dibuka
    public function mount($eventId)
    {
        $this->event = Event::findOrFail($eventId);

        // Cek jika pendaftaran sudah ditutup, redirect kembali
        if (now()->gt($this->event->registration_end)) {
            abort(403, 'Pendaftaran untuk event ini sudah ditutup.');
        }
    }

    public function register()
    {
        $this->validate([
            'full_name' => 'required|string|max:255',
            'nip_nidn' => 'required|string|max:50',
            'email' => 'required|email|max:255',
        ]);

        // Cek duplikasi email
        $exists = EventRegistration::where('event_id', $this->event->id)
            ->where('email', $this->email)
            ->exists();
        if ($exists) {
            $this->addError('email', 'Email ini sudah terdaftar di event ini.');

            return;
        }

        // Simpan ke database
        EventRegistration::create([
            'event_id' => $this->event->id,
            'full_name' => $this->full_name,
            'nip_nidn' => $this->nip_nidn,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Pendaftaran berhasil! Silakan cek email Anda secara berkala.');

        // Reset form
        $this->reset(['full_name', 'nip_nidn', 'email']);
    }

    public function render()
    {
        return view('livewire.event-register')->layout('layouts.app');
    }
}
