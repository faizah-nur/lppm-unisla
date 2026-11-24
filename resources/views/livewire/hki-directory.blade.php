@section('title', 'Karya Tercatat HKI - litbangpemas')

<div class="bg-gray-50 min-h-screen">
    <!-- 1. HERO SECTION -->
    <div
        class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-32 pb-20 text-center text-white border-b border-emerald-800/50 overflow-hidden">
        <!-- Ornamen Dekoratif Latar Belakang -->
        <div class="absolute inset-0 opacity-20 pointer-events-none"
            style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Ikon Hero -->
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-white/15 backdrop-blur-sm shadow-inner">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Karya Tercatat <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Hak Kekayaan
                    Intelektual</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Daftar paten, hak cipta, dan kekayaan intelektual sivitas akademika Universitas Islam Lamongan yang
                telah terdaftar resmi.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Keterangan & Sinkronisasi -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <p class="text-xs sm:text-sm text-gray-500">
                Pengajuan berstatus draft atau dalam proses <strong>tidak ditampilkan</strong> demi kerahasiaan karya.
            </p>
            <div class="flex-shrink-0">
                <!-- Tombol Sinkron SINTA (Dummy) -->
                <button onclick="alert('Fitur integrasi API sedang dalam pengembangan.')"
                    class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-emerald-200 rounded-full text-xs font-semibold text-emerald-700 hover:bg-emerald-50 transition-colors shadow-sm">
                    <svg class="w-3.5 h-3.5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15">
                        </path>
                    </svg>
                    SINKRON SINTA
                </button>
            </div>
        </div>

        <!-- Filter & Search -->
        <div
            class="bg-white p-4 rounded-2xl shadow-sm border border-gray-200 mb-8 flex flex-col md:flex-row gap-4 items-center">

            <!-- Info Kategori -->
            <div class="flex gap-2">
                <div
                    class="flex items-center gap-2 bg-yellow-50/60 border border-yellow-200/80 px-3 py-1.5 rounded-lg text-sm">
                    <span class="font-bold text-gray-700">Hak Cipta</span>
                    <span
                        class="bg-yellow-200/70 text-yellow-800 px-2 py-0.5 rounded text-xs font-bold">{{ $totalHakCipta }}</span>
                </div>
                <div
                    class="flex items-center gap-2 bg-emerald-50/60 border border-emerald-200/80 px-3 py-1.5 rounded-lg text-sm">
                    <span class="font-bold text-gray-700">Paten</span>
                    <span
                        class="bg-emerald-200/70 text-emerald-800 px-2 py-0.5 rounded text-xs font-bold">{{ $totalPaten }}</span>
                </div>
            </div>

            <div class="flex-grow"></div>

            <!-- Search Input -->
            <div class="w-full md:w-72 relative">
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari judul karya..."
                    class="w-full pl-4 pr-10 py-2 border border-gray-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm">
            </div>

            <!-- Dropdown Filter -->
            <select wire:model.live="filterJenis"
                class="w-full md:w-48 border border-gray-300 rounded-lg shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2 pl-3 pr-8 text-sm text-gray-700">
                <option value="">Semua jenis HKI</option>
                <option value="Hak Cipta">Hak Cipta</option>
                <option value="Paten">Paten</option>
            </select>

            <!-- Tombol Cari -->
            <button
                class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors text-sm flex items-center gap-2 shadow-sm shadow-emerald-900/10">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                Cari
            </button>
        </div>

        <!-- Grid HKI -->
        @if ($hkis->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($hkis as $hki)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300 border border-gray-200 p-6 flex flex-col group">

                        <!-- Header Card -->
                        <div class="flex items-start justify-between mb-4">
                            <span
                                class="bg-emerald-50 text-emerald-800 text-[10px] font-bold px-2 py-1 rounded border border-emerald-100 uppercase tracking-wider">
                                {{ $hki->jenis_ki }}
                            </span>
                            <span
                                class="bg-yellow-50 text-yellow-700 text-[10px] font-bold px-2 py-1 rounded border border-yellow-200 flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                {{ $hki->status }}
                            </span>
                        </div>

                        <!-- Judul -->
                        <h3
                            class="text-lg font-bold text-gray-900 mb-4 line-clamp-2 leading-snug group-hover:text-emerald-800 transition-colors">
                            {{ $hki->judul }}
                        </h3>

                        <!-- Meta Info -->
                        <div class="text-sm text-gray-600 space-y-2 mb-6">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600/70" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>Tahun: <strong>{{ $hki->tahun_permohonan }}</strong></span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-emerald-600/70" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>Sertifikat: <strong>{{ $hki->nomor_sertifikat ?? 'Belum ada' }}</strong></span>
                            </div>
                        </div>

                        <!-- Footer Card -->
                        <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ route('publikasi.hki.detail', $hki->id) }}" wire:navigate
                                class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 group/btn">
                                Lihat Detail
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>

                            <span class="text-xs text-gray-500 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                    </path>
                                </svg>
                                @if ($hki->abstrak)
                                    1 Berkas
                                @else
                                    Belum ada berkas
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $hkis->links() }}
            </div>
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-gray-200">
                <p class="text-gray-500">Tidak ada data HKI yang ditemukan.</p>
            </div>
        @endif

    </div>
</div>
