<?php

use App\Livewire\ProfilPage;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});
// Route Profil
Route::get('/profil', ProfilPage::class)->name('profil');
