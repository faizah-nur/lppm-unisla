<div>
    <!-- Modal Container -->
    <div x-data="{ show: @entangle('isOpen') }" x-show="show" x-cloak @keydown.escape.window="$wire.closeModal()" style="display: none;"
        class="fixed inset-0 z-[999] overflow-y-auto" role="dialog" aria-modal="true">

        <!-- Backdrop -->
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="$wire.closeModal()"
            class="fixed inset-0 bg-gray-950/80 backdrop-blur-sm transition-opacity cursor-pointer"></div>

        <!-- Panel Modal (Tinggi & Lebar Maksimal untuk Fitur Lengkap PDF Browser) -->
        <div class="flex min-h-full items-center justify-center p-2 sm:p-4 md:p-6 text-center">
            <div x-show="show" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full sm:max-w-5xl lg:max-w-6xl xl:max-w-7xl border border-gray-200/80 flex flex-col h-[90vh] md:h-[92vh]">

                <!-- Header Modal -->
                <div class="flex items-center justify-between px-4 sm:px-6 py-3.5 border-b border-gray-200 bg-white shrink-0 gap-3">
                    <!-- Judul & Ikon Dokumen -->
                    <div class="flex items-center gap-3 min-w-0 pr-2">
                        <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center shrink-0 border border-emerald-100 shadow-2xs">
                            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <h3 class="text-sm sm:text-base font-bold text-gray-900 truncate" title="{{ $title }}">{{ $title ?? 'Pratinjau Dokumen' }}</h3>
                            <p class="text-[11px] text-gray-500">Pratinjau Dokumen Resmi Litbang Pemas UNISLA</p>
                        </div>
                    </div>

                    <!-- Tombol Aksi Header -->
                    <div class="flex items-center gap-2 shrink-0">
                        @if ($fileUrl)
                            <!-- Tombol Buka Tab Baru (Bisa akses full screen browser jika diinginkan) -->
                            <a href="{{ $fileUrl }}" target="_blank" rel="noopener noreferrer"
                                title="Buka di tab baru browser"
                                class="hidden sm:inline-flex items-center gap-1.5 px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-xl text-xs sm:text-sm font-semibold transition-colors">
                                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                                <span>Tab Baru</span>
                            </a>
                        @endif

                        @if ($downloadUrl)
                            <!-- Tombol Download Langsung -->
                            <a href="{{ $downloadUrl }}" download
                                title="Unduh File Dokumen"
                                class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white px-3.5 py-2 rounded-xl text-xs sm:text-sm font-semibold transition-colors shadow-2xs">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                    </path>
                                </svg>
                                <span>Unduh</span>
                            </a>
                        @endif

                        <!-- Tombol Close Modal -->
                        <button wire:click="closeModal" type="button" aria-label="Tutup pratinjau"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-900 rounded-xl p-2 transition-colors focus:outline-none cursor-pointer">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body Modal (PDF Viewer dengan fitur lengkap browser bawaan: zoom, search, rotate, print, dsb) -->
                <div class="flex-1 bg-gray-100 relative w-full h-full overflow-hidden">
                    @if ($fileUrl)
                        <iframe src="{{ $fileUrl }}" class="w-full h-full border-0" type="application/pdf" title="{{ $title }}">
                            <!-- Fallback Object & Embed -->
                            <object data="{{ $fileUrl }}" type="application/pdf" class="w-full h-full">
                                <embed src="{{ $fileUrl }}" type="application/pdf" class="w-full h-full" />
                                <div class="flex flex-col items-center justify-center h-full text-gray-700 p-6 text-center">
                                    <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="mb-4 text-base font-semibold">Browser Anda tidak mendukung pratinjau PDF langsung.</p>
                                    <a href="{{ $fileUrl }}" target="_blank"
                                        class="bg-emerald-600 hover:bg-emerald-700 text-white px-5 py-2.5 rounded-xl font-bold transition-colors shadow-sm">
                                        Buka Dokumen di Tab Baru
                                    </a>
                                </div>
                            </object>
                        </iframe>
                    @else
                        <div class="flex flex-col items-center justify-center h-full text-gray-500 p-6 text-center">
                            <p class="text-sm">Memuat dokumen...</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
