<?php

use App\Livewire\BookDirectory;
use App\Livewire\EventList;
use App\Livewire\EventRegister;
use App\Livewire\GrantDashboard;
use App\Livewire\HkiDetail;
use App\Livewire\HkiDirectory;
use App\Livewire\InformasiDetail;
use App\Livewire\JournalDirectory;
use App\Livewire\KknFlow;
use App\Livewire\KknNewsDetail;
use App\Livewire\KknNewsDirectory;
use App\Livewire\KknSchemes;
use App\Livewire\LayananPage;
use App\Livewire\PartnershipDirectory;
use App\Livewire\ProductDetail;
use App\Livewire\ProductDirectory;
use App\Livewire\ProfilPage;
use App\Livewire\ResearcherList;
use Illuminate\Support\Facades\Route;

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

// Publikasi
Route::get('/publikasi/jurnal', JournalDirectory::class)->name('publikasi.jurnal');
// Halaman Daftar HKI
Route::get('/publikasi/hki', HkiDirectory::class)->name('publikasi.hki');
// Halaman Detail HKI
Route::get('/publikasi/hki/{id}', HkiDetail::class)->name('publikasi.hki.detail');
// Buku
Route::get('/publikasi/buku', BookDirectory::class)->name('publikasi.buku');
// produk
Route::get('/produk-jasa', ProductDirectory::class)->name('produk.directory');
Route::get('/produk-jasa/{id}', ProductDetail::class)->name('produk.detail');
// kkn
Route::get('/kkn/alur', KknFlow::class)->name('kkn.alur');
Route::get('/kkn/skema', KknSchemes::class)->name('kkn.skema');
Route::get('/kkn/informasi', KknNewsDirectory::class)->name('kkn.informasi');
Route::get('/kkn/informasi/{id}', KknNewsDetail::class)->name('kkn.informasi.detail');

// Route fallback untuk menyajikan file /storage/ jika symlink Windows tidak aktif
Route::get('/storage/{path}', function ($path) {
    $filePath = storage_path('app/public/'.$path);
    if (! file_exists($filePath)) {
        abort(404);
    }

    return response()->file($filePath);
})->where('path', '.*')->name('storage.local');
