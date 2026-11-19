<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class EventList extends Component
{
    public function render()
    {
        // Ambil event yang tanggal pelaksanaannya belum lewat
        $events = Event::where('event_date', '>=', now()->startOfDay())
            ->latest('event_date')
            ->get();

        return view('livewire.event-list', [
            'events' => $events
        ])->layout('layouts.app'); // Layout ini bisa diabaikan saat di-include di beranda
    }
}