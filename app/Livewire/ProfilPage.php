<?php

namespace App\Livewire;

use App\Models\OrganizationMember;
use App\Models\Profile;
use Livewire\Component;

class ProfilPage extends Component
{
    public function render()
    {
        // Ambil semua data berdasarkan urutan (1, 2, 3, dst)
        $members = OrganizationMember::orderBy('order', 'asc')->get();

        // Ambil yang pertama (Urutan 1 / Ketua) untuk ditaruh paling atas
        $topLeader = $members->first();

        // Ambil sisanya (Urutan 2 ke atas) untuk ditaruh di baris kedua dan seterusnya
        $otherMembers = $members->slice(1)->values();

        return view('livewire.profil-page', [
            'profile' => Profile::first(),
            'topLeader' => $topLeader,
            'otherMembers' => $otherMembers,
        ])->layout('layouts.app');
    }
}
