<?php

use App\Livewire\InformasiDetail;
use App\Livewire\InformasiPage;
use App\Livewire\ProfilPage;
use App\Livewire\ResearcherList;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('beranda');
});
// Route Profil
Route::get('/profil', ProfilPage::class)->name('profil');

Route::get('/peneliti', ResearcherList::class)->name('peneliti.index');

Route::get('/informasi', InformasiPage::class)->name('informasi');
Route::get('/informasi/{id}', InformasiDetail::class)->name('informasi.detail');
