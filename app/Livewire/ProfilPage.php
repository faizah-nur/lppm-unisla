<?php

namespace App\Livewire;

use App\Models\OrganizationMember;
use App\Models\Profile;
use Livewire\Component;

class ProfilPage extends Component
{
    public function render()
    {
        return view('livewire.profil-page', [
            'profile' => Profile::first(),
            'members' => OrganizationMember::orderBy('order')->get(),
        ])->layout('layouts.app'); // Pastikan baris ini ada
    }
}
