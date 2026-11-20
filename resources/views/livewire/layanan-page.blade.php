@section('title', 'Layanan & Download - litbangpemas')

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
            <!-- Breadcrumb Navigasi -->
            <nav class="inline-flex items-center gap-2 text-xs sm:text-sm text-emerald-200/70 mb-5"
                aria-label="Breadcrumb">
                <a href="/" wire:navigate class="hover:text-yellow-300 transition-colors">Beranda</a>
                <svg class="w-3.5 h-3.5 text-emerald-300/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <span class="text-yellow-300 font-medium">Layanan & Download</span>
            </nav>

            <!-- Ikon Hero -->
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-white/15 backdrop-blur-sm shadow-inner">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Layanan & <span class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Pusat Unduhan</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Temukan dan unduh panduan, template proposal, formulir, dan dokumen penting lainnya untuk keperluan penelitian dan pengabdian masyarakat.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Pencarian & Judul Konten -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div class="flex items-center gap-2.5">
                <span class="w-1.5 h-6 bg-gradient-to-b from-yellow-400 to-emerald-600 rounded-full"></span>
                <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Daftar Dokumen & Panduan</h2>
            </div>

            <!-- Search Box -->
            <div class="w-full md:w-80 relative flex-shrink-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari nama dokumen..."
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-xs focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition-all">
                </div>
            </div>
        </div>

        <!-- Filter Kategori (Pills) -->
        <div class="flex flex-wrap items-center gap-2 mb-6">
            <button wire:click="setCategory('')"
                class="px-5 py-2 rounded-full text-sm font-semibold transition-colors border {{ $filterCategory === '' ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300' }}">
                Semua
            </button>
            @foreach ($availableCategories as $category)
                <button wire:click="setCategory('{{ $category }}')"
                    class="px-5 py-2 rounded-full text-sm font-semibold transition-colors border uppercase {{ $filterCategory === $category ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300' }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Filter Tahun -->
        <div class="flex flex-wrap items-center gap-3 mb-12">
            <span class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tahun Publikasi:</span>
            <button wire:click="setYear('')"
                class="px-4 py-1.5 rounded-full text-xs font-semibold transition-colors {{ $filterYear === '' ? 'bg-gray-800 text-white' : 'bg-white text-gray-600 border border-gray-200 hover:bg-gray-50' }}">
                Semua
            </button>
            @foreach ($availableYears as $year)
                <button wire:click="setYear('{{ $year }}')"
                    class="px-4 py-1.5 rounded-full text-xs font-semibold transition-colors border {{ $filterYear == $year ? 'bg-gray-800 text-white border-gray-800' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' }}">
                    {{ $year }}
                </button>
            @endforeach
        </div>

        <!-- List Dokumen Berdasarkan Kategori -->
        @if ($services->count() > 0)
            <div class="space-y-10">
                @foreach ($services as $category => $items)
                    <div>
                        <!-- Header Kategori -->
                        <div class="flex items-center gap-4 mb-4">
                            <div
                                class="w-12 h-12 bg-emerald-600 rounded-xl flex items-center justify-center shrink-0 shadow-sm">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-gray-900 uppercase">{{ $category }}</h2>
                                <p class="text-sm text-gray-500">{{ $items->count() }} berkas tersedia</p>
                            </div>
                        </div>

                        <!-- List Item -->
                        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                            @foreach ($items as $item)
                                <div
                                    class="flex flex-col sm:flex-row items-start sm:items-center justify-between p-5 border-b border-gray-100 last:border-0 hover:bg-gray-50 transition-colors gap-4">

                                    <!-- Kiri: Icon & Info -->
                                    <div class="flex items-start gap-4 flex-grow">
                                        <div
                                            class="w-10 h-10 bg-blue-50 rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9">
                                                </path>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="flex items-center gap-2 mb-1">
                                                <h3 class="text-base font-bold text-gray-900 leading-tight">
                                                    {{ $item->title }}</h3>
                                                @if ($item->external_url)
                                                    <span
                                                        class="inline-flex items-center gap-1 bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-0.5 rounded border border-blue-100">
                                                        <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                            </path>
                                                        </svg>
                                                        LINK
                                                    </span>
                                                @endif
                                            </div>
                                            <p class="text-sm text-gray-500 line-clamp-1">
                                                {{ $item->description ?? 'Tidak ada deskripsi.' }}</p>
                                        </div>
                                    </div>

                                    <!-- Kanan: Meta & Aksi -->
                                    <div
                                        class="flex items-center gap-6 shrink-0 w-full sm:w-auto justify-between sm:justify-end">
                                        <div class="flex items-center gap-4 text-xs text-gray-500">
                                            <div class="flex items-center gap-1.5">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                                            </div>
                                            <div class="flex items-center gap-1.5">
                                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                    </path>
                                                </svg>
                                                0x
                                            </div>
                                        </div>

                                        <a href="{{ $item->external_url ?? ($item->file_path ? Storage::url($item->file_path) : '#') }}"
                                            target="_blank"
                                            class="inline-flex items-center gap-1 text-sm font-bold text-emerald-600 hover:text-emerald-700 transition-colors">
                                            Buka
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Dokumen tidak ditemukan</h3>
                <p class="mt-1 text-sm text-gray-500">Coba sesuaikan kata kunci atau filter Anda.</p>
            </div>
        @endif

        <!-- Komponen Modal Preview PDF -->
        <livewire:pdf-preview-modal />

    </div>
</div>
