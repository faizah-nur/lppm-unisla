<?php

use App\Livewire\EventList;
use App\Livewire\EventRegister;
use App\Livewire\InformasiDetail;
use App\Livewire\LayananPage;
use App\Livewire\PartnershipDirectory;
use App\Livewire\ProfilPage;
use App\Livewire\ResearcherList;
use Illuminate\Support\Facades\Route;
use App\Livewire\GrantDashboard;

Route::get('/', function () {
    return view('beranda');
});
// Route Profil
Route::get('/profil', ProfilPage::class)->name('profil');

Route::get('/peneliti', ResearcherList::class)->name('peneliti.index');

Route::redirect('/informasi', '/#informasi')->name('informasi');
Route::get('/informasi/{id}', InformasiDetail::class)->name('informasi.detail');
Route::get('/layanan', LayananPage::class)->name('layanan');
Route::get('/kerjasama/direktori', PartnershipDirectory::class)->name('kerjasama.directory');

// Route untuk menampilkan daftar event (bisa ditaruh di Beranda)
Route::get('/event', EventList::class)->name('event.list');

// Route untuk form pendaftaran event
Route::get('/event/{eventId}/daftar', EventRegister::class)->name('event.register');


// Penelitian
Route::get('/penelitian/internal', GrantDashboard::class)->name('penelitian.internal')->defaults('kategoriKegiatan', 'Penelitian')->defaults('kategoriSumber', 'internal');
Route::get('/penelitian/eksternal', GrantDashboard::class)->name('penelitian.eksternal')->defaults('kategoriKegiatan', 'Penelitian')->defaults('kategoriSumber', 'eksternal_dn');
Route::get('/penelitian/internasional', GrantDashboard::class)->name('penelitian.internasional')->defaults('kategoriKegiatan', 'Penelitian')->defaults('kategoriSumber', 'internasional');

// Pengabdian
Route::get('/pengabdian/internal', GrantDashboard::class)->name('pengabdian.internal')->defaults('kategoriKegiatan', 'Pengabdian')->defaults('kategoriSumber', 'internal');
Route::get('/pengabdian/eksternal', GrantDashboard::class)->name('pengabdian.eksternal')->defaults('kategoriKegiatan', 'Pengabdian')->defaults('kategoriSumber', 'eksternal_dn');
Route::get('/pengabdian/internasional', GrantDashboard::class)->name('pengabdian.internasional')->defaults('kategoriKegiatan', 'Pengabdian')->defaults('kategoriSumber', 'internasional');