<div class="bg-white min-h-screen pb-20">

    <!-- 1. HERO UTAMA (DIPERTAHANKAN DESAIN ASLI) -->
    <div class="bg-emerald-800 pt-32 pb-16 text-center text-white border-b border-emerald-700/50">
        <div class="max-w-3xl mx-auto px-4">
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/10">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-3">Layanan & Download</h1>
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto">
                Berbagai layanan dan dokumen yang dapat diunduh untuk mendukung kegiatan penelitian dan pengabdian
                masyarakat.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-12">

        <!-- 2. KATEGORI 'LAYANAN LAINNYA' (Tepat di bawah hero utama) -->
        @if (isset($services['Layanan Lainnya']))
            <div id="layanan-lainnya" class="mb-16 scroll-mt-28">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($services['Layanan Lainnya'] as $item)
                        <div
                            class="bg-gray-50/80 rounded-2xl border border-gray-100 p-6 flex flex-col hover:border-emerald-300 hover:shadow-sm transition-all duration-200 group">

                            <div class="flex items-start gap-4 mb-4">
                                <div
                                    class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center shrink-0 border border-emerald-200/50 group-hover:bg-emerald-200 transition-colors">
                                    <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </div>
                                <h3 class="text-base font-bold text-gray-900 leading-snug line-clamp-2"
                                    title="{{ $item->title }}">
                                    {{ $item->title }}
                                </h3>
                            </div>

                            @if ($item->description)
                                <p class="text-sm text-gray-500 mb-5 line-clamp-3 leading-relaxed">
                                    {{ $item->description }}</p>
                            @endif

                            <div class="mt-auto pt-4 border-t border-gray-100">
                                @if ($item->external_url)
                                    <a href="{{ $item->external_url }}" target="_blank"
                                        class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                                        Download
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                    </a>
                                @elseif($item->file_path)
                                    <button type="button"
                                        wire:click="$dispatch('open-preview-modal', { id: {{ $item->id }} })"
                                        class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                                        Download
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                            </path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif


        <!-- 3. HERO KECIL 'DOWNLOAD' -->
        <div class="bg-emerald-800 rounded-3xl py-12 px-6 text-center text-white mb-12 shadow-lg">
            <div
                class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/10 backdrop-blur-sm">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                </svg>
            </div>
            <h2 class="text-2xl md:text-3xl font-bold mb-3">Download</h2>
            <p class="text-emerald-100/90 text-sm md:text-base max-w-xl mx-auto leading-relaxed">
                Panduan, pedoman, dan dokumen penting untuk mendukung kegiatan penelitian dan pengabdian masyarakat.
            </p>
        </div>


        <!-- 4. KATEGORI LAINNYA (Panduan, RENSTRA, Surat Izin Orang Tua) -->
        @foreach ($services as $category => $items)
            @if ($category !== 'Layanan Lainnya')
                <div id="{{ Str::slug($category) }}" class="mb-12 scroll-mt-28">
                    <!-- Judul Kategori -->
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-emerald-100 rounded-xl flex items-center justify-center shrink-0">
                            @if (Str::contains(strtolower($category), 'renstra'))
                                <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                </svg>
                            @elseif(Str::contains(strtolower($category), 'surat'))
                                <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            @else
                                <svg class="w-6 h-6 text-emerald-700" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            @endif
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900">{{ $category }}</h2>
                    </div>

                    <!-- Grid Item Dokumen -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        @foreach ($items as $item)
                            <div
                                class="bg-gray-50/80 rounded-2xl border border-gray-100 p-5 flex flex-col hover:border-emerald-300 hover:shadow-sm transition-all duration-200 group">

                                <div class="flex items-start gap-3 mb-3">
                                    <div
                                        class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center shrink-0 border border-emerald-100/50 group-hover:bg-emerald-100 transition-colors">
                                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h3 class="text-sm font-semibold text-gray-800 leading-snug line-clamp-3"
                                        title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </h3>
                                </div>

                                @if ($item->description)
                                    <p class="text-xs text-gray-500 mb-4 line-clamp-2">{{ $item->description }}</p>
                                @endif

                                <div class="mt-auto pt-2">
                                    @if ($item->external_url)
                                        <a href="{{ $item->external_url }}" target="_blank"
                                            class="inline-flex items-center gap-1.5 text-[13px] font-medium text-gray-600 hover:text-emerald-700 transition-colors">
                                            Download
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                        </a>
                                    @elseif($item->file_path)
                                        <button type="button"
                                            wire:click="$dispatch('open-preview-modal', { id: {{ $item->id }} })"
                                            class="inline-flex items-center gap-1.5 text-[13px] font-medium text-gray-600 hover:text-emerald-700 transition-colors">
                                            Download
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        <!-- Panggil Komponen Modal Preview PDF -->
        <livewire:pdf-preview-modal />

    </div>
</div>
