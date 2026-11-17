@section('title', 'Direktori Dokumen Kerjasama - litbangpemas')

<div class="bg-gray-50 min-h-screen">
    <!-- 1. HERO SECTION -->
    <div
        class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-32 pb-24 text-center text-white border-b border-emerald-800/50 overflow-hidden">
        <!-- Ornamen Dekoratif Latar Belakang -->
        <div class="absolute inset-0 opacity-20 pointer-events-none"
            style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Direktori <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Dokumen
                    Kemitraan</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Pusat data dan penelusuran arsip resmi kerja sama kelembagaan, MoU, MoA, dan SPK litbangpemas
                Universitas Islam Lamongan.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-10 relative z-10 pb-20">

        <!-- 2. KARTU STATISTIK (Floating di atas Hero) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <!-- Card 1: Dokumen Bertautan -->
            <div
                class="bg-white rounded-2xl p-5 border border-emerald-100/80 shadow-lg shadow-emerald-950/5 flex items-center gap-4 hover:-translate-y-0.5 transition-transform duration-200">
                <div
                    class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center shrink-0 border border-emerald-100 text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-emerald-950">{{ $stats['total_linked'] }}</h3>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Dokumen Bertautan</p>
                    <p class="text-[11px] text-gray-400">MoU, MoA, & SPK</p>
                </div>
            </div>

            <!-- Card 2: Kelembagaan -->
            <div
                class="bg-white rounded-2xl p-5 border border-emerald-100/80 shadow-lg shadow-emerald-950/5 flex items-center gap-4 hover:-translate-y-0.5 transition-transform duration-200">
                <div
                    class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center shrink-0 border border-blue-100 text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-emerald-950">{{ $stats['total_institutional'] }}</h3>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Kelembagaan</p>
                    <p class="text-[11px] text-gray-400">MoU dan MoA</p>
                </div>
            </div>

            <!-- Card 3: Dokumen Aktif -->
            <div
                class="bg-white rounded-2xl p-5 border border-emerald-100/80 shadow-lg shadow-emerald-950/5 flex items-center gap-4 hover:-translate-y-0.5 transition-transform duration-200">
                <div
                    class="w-12 h-12 rounded-xl bg-emerald-50 flex items-center justify-center shrink-0 border border-emerald-100 text-emerald-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-emerald-950">
                        {{ $stats['total_active'] ?? $stats['total_publication'] }}</h3>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Dokumen Aktif</p>
                    <p class="text-[11px] text-gray-400">Status berlaku</p>
                </div>
            </div>

            <!-- Card 4: Dalam Proses -->
            <div
                class="bg-white rounded-2xl p-5 border border-emerald-100/80 shadow-lg shadow-emerald-950/5 flex items-center gap-4 hover:-translate-y-0.5 transition-transform duration-200">
                <div
                    class="w-12 h-12 rounded-xl bg-amber-50 flex items-center justify-center shrink-0 border border-amber-100 text-amber-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-2xl font-extrabold text-emerald-950">{{ $stats['total_processing'] }}</h3>
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Dalam Proses</p>
                    <p class="text-[11px] text-gray-400">Pemberkasan</p>
                </div>
            </div>
        </div>

        <!-- 3. BANNER INFORMASI / CATATAN -->
        <div
            class="bg-white rounded-2xl p-4 sm:p-5 mb-8 border border-emerald-100/80 shadow-xs flex items-start gap-3.5">
            <div class="p-2 bg-emerald-50 rounded-xl text-emerald-600 shrink-0 border border-emerald-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                <strong class="font-semibold text-emerald-950">Catatan Direktori:</strong> Rekap menunjukkan jumlah
                entri dokumen yang memiliki tautan berkas arsip digital. Keberadaan tautan membuktikan pencatatan
                dokumen secara sah di litbangpemas UNISLA.
            </p>
        </div>

        <!-- 4. PENCARIAN & FILTER -->
        <div
            class="bg-white p-4 rounded-2xl shadow-sm border border-emerald-100/80 mb-6 flex flex-col md:flex-row gap-3 items-center">
            <!-- Input Cari -->
            <div class="flex-grow relative w-full">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Cari nama mitra, judul kerjasama, nomor dokumen..."
                    class="w-full pl-10 pr-4 py-2.5 bg-gray-50/70 border border-gray-200 rounded-xl text-sm placeholder-gray-400 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all">
            </div>

            <!-- Filter Jenis Dokumen -->
            <div class="w-full md:w-44">
                <select wire:model.live="filterType"
                    class="w-full py-2.5 px-3 bg-gray-50/70 border border-gray-200 rounded-xl text-sm text-gray-700 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all">
                    <option value="">Semua Jenis</option>
                    <option value="MoU">MoU</option>
                    <option value="MoA">MoA</option>
                    <option value="SPK">SPK</option>
                </select>
            </div>

            <!-- Filter Status Dokumen -->
            <div class="w-full md:w-44">
                <select wire:model.live="filterStatus"
                    class="w-full py-2.5 px-3 bg-gray-50/70 border border-gray-200 rounded-xl text-sm text-gray-700 focus:bg-white focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 transition-all">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Dalam Proses">Dalam Proses</option>
                    <option value="Kedaluwarsa">Kedaluwarsa</option>
                </select>
            </div>

            <!-- Tombol Reset Filter -->
            @if ($search || $filterType || $filterStatus)
                <button wire:click="resetFilter" type="button"
                    class="w-full md:w-auto px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-sm font-medium transition-colors shrink-0 flex items-center justify-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Reset
                </button>
            @endif
        </div>

        <!-- Indikator Jumlah Data & Loading -->
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3 text-sm text-gray-500">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-500"></span>
                <span>Menampilkan <strong class="text-emerald-950 font-bold">{{ $documents->total() }}</strong> entri
                    dokumen kemitraan</span>
            </div>

            <div wire:loading class="text-emerald-600 text-sm font-medium flex items-center gap-2">
                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Memuat data...
            </div>
        </div>

        <!-- 5. GRID DOKUMEN -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl md:text-2xl font-bold text-emerald-950 flex items-center gap-2.5">
                Daftar Dokumen MoU, MoA & SPK
            </h2>
        </div>

        @if ($documents->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach ($documents as $doc)
                    <div
                        class="group bg-white rounded-3xl shadow-sm hover:shadow-xl hover:shadow-emerald-950/5 border border-emerald-100/70 hover:border-emerald-300 transition-all duration-300 flex flex-col overflow-hidden">

                        <!-- Area Logo Mitra & Badges -->
                        <div
                            class="relative p-6 flex items-center justify-center h-44 bg-gradient-to-br from-emerald-50/50 via-white to-gray-50/50 border-b border-emerald-100/60 overflow-hidden">
                            <!-- Pola radial latar belakang logo -->
                            <div
                                class="absolute inset-0 bg-[radial-gradient(circle_at_50%_40%,rgba(16,185,129,0.06),transparent_70%)]">
                            </div>

                            <!-- Badges Pojok Kiri Atas -->
                            <div class="absolute top-3.5 left-3.5 flex flex-wrap gap-1.5 z-10">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-950 text-white shadow-xs">
                                    {{ $doc->type }}
                                </span>
                                @if ($doc->is_archived)
                                    <span
                                        class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                        Arsip
                                    </span>
                                @endif
                            </div>

                            <!-- Status Badge Pojok Kanan Atas -->
                            <div class="absolute top-3.5 right-3.5 z-10">
                                @if ($doc->status === 'Aktif')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                        Aktif
                                    </span>
                                @elseif ($doc->status === 'Dalam Proses')
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-50 text-amber-700 border border-amber-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                        Dalam Proses
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-gray-100 text-gray-600 border border-gray-200">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        {{ $doc->status ?? 'Kedaluwarsa' }}
                                    </span>
                                @endif
                            </div>

                            <!-- Gambar Logo Mitra -->
                            @if ($doc->partner && $doc->partner->logo_path)
                                <img src="{{ Storage::url($doc->partner->logo_path) }}"
                                    alt="Logo {{ $doc->partner->name }}"
                                    class="relative max-h-24 max-w-[80%] object-contain group-hover:scale-105 transition-transform duration-300 drop-shadow-xs">
                            @else
                                <!-- Placeholder jika tidak ada logo -->
                                <div
                                    class="relative w-20 h-20 bg-emerald-100/60 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:scale-105 transition-transform duration-300">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <!-- Konten Kartu -->
                        <div class="p-6 flex-grow flex flex-col">
                            <!-- Nama Mitra -->
                            <div class="flex items-center gap-2 text-xs font-semibold text-emerald-700 mb-2">
                                <svg class="w-4 h-4 shrink-0 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                <span class="truncate" title="{{ $doc->partner->name ?? 'Mitra Terkait' }}">
                                    {{ $doc->partner->name ?? 'Mitra Tidak Diketahui' }}
                                </span>
                            </div>

                            <!-- Judul Kerjasama -->
                            <h3 class="text-base font-bold text-gray-900 group-hover:text-emerald-700 transition-colors leading-snug line-clamp-2 mb-4"
                                title="{{ $doc->title }}">
                                {{ $doc->title }}
                            </h3>

                            <!-- Metadata Info -->
                            <div class="mt-auto space-y-2.5 pt-4 border-t border-gray-100 text-xs text-gray-600">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-gray-400 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                        </svg>
                                        Nomor:
                                    </span>
                                    <span class="font-medium text-gray-800 truncate max-w-[180px]"
                                        title="{{ $doc->document_number }}">
                                        {{ $doc->document_number ?? 'Belum tercatat' }}
                                    </span>
                                </div>

                                <div class="flex items-center justify-between gap-2">
                                    <span class="text-gray-400 flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Masa Berlaku:
                                    </span>
                                    <span class="font-medium text-gray-800">
                                        {{ $doc->start_date ? \Carbon\Carbon::parse($doc->start_date)->translatedFormat('d M Y') : '-' }}
                                        @if ($doc->end_date)
                                            <span class="text-gray-400">s/d</span>
                                            {{ \Carbon\Carbon::parse($doc->end_date)->translatedFormat('d M Y') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="p-5 pt-0 bg-white">
                            @if ($doc->file_path)
                                <button type="button"
                                    wire:click="$dispatch('open-preview-modal', { id: {{ $doc->id }}, type: 'partnership', url: '{{ Storage::url($doc->file_path) }}', title: '{{ addslashes($doc->title) }}' })"
                                    class="w-full inline-flex items-center justify-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-xl shadow-xs hover:shadow-md hover:shadow-emerald-900/10 transition-all duration-200 text-sm cursor-pointer">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                    Lihat Dokumen
                                </button>
                            @else
                                <button disabled
                                    class="w-full inline-flex items-center justify-center gap-2 bg-gray-100 text-gray-400 font-semibold py-2.5 px-4 rounded-xl cursor-not-allowed text-sm border border-gray-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636">
                                        </path>
                                    </svg>
                                    Dokumen Belum Tersedia
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigasi Paginasi -->
            <div class="mt-8">
                {{ $documents->links() }}
            </div>
        @else
            <!-- Tampilan Kosong (Empty State) -->
            <div class="text-center py-20 bg-white rounded-3xl border border-emerald-100 shadow-sm">
                <div
                    class="mx-auto w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mb-4 text-emerald-600 border border-emerald-100">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-emerald-950">Tidak ada dokumen ditemukan</h3>
                <p class="mt-1 text-sm text-gray-500 max-w-sm mx-auto">
                    Coba sesuaikan kata kunci pencarian atau bersihkan filter untuk menampilkan data dokumen kerjasama.
                </p>
                @if ($search || $filterType || $filterStatus)
                    <button wire:click="resetFilter" type="button"
                        class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 text-sm font-semibold rounded-xl border border-emerald-200 transition-colors cursor-pointer">
                        Reset Semua Filter
                    </button>
                @endif
            </div>
        @endif

        <!-- Komponen Modal Pratinjau Dokumen PDF -->
        <livewire:pdf-preview-modal />

    </div>
</div>
