<div>
    <!-- Modal Container -->
    <div x-data="{ show: @entangle('isOpen') }" x-show="show" x-cloak @keydown.escape.window="$wire.closeModal()" style="display: none;"
        class="fixed inset-0 z-[999] overflow-y-auto" role="dialog" aria-modal="true">

        <!-- Backdrop -->
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="$wire.closeModal()"
            class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity cursor-pointer"></div>

        <!-- Panel (Padding Top agar tidak tertutup navbar) -->
        <div class="flex min-h-full items-start justify-center p-4 pt-24 sm:pt-28 text-center">
            <div x-show="show" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all sm:w-full sm:max-w-5xl border border-gray-100 flex flex-col h-[80vh]">

                <!-- Header Modal -->
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100 bg-white">
                    <h3 class="text-lg font-bold text-gray-900">Pratinjau Dokumen</h3>
                    <div class="flex items-center gap-3">
                        <!-- Tombol Download Langsung -->
                        <a href="{{ $downloadUrl }}" download
                            class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4">
                                </path>
                            </svg>
                            Download
                        </a>
                        <!-- Tombol Close -->
                        <button wire:click="closeModal" type="button"
                            class="bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-full p-2 transition-colors focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body Modal (Object PDF) -->
                <div class="flex-1 bg-gray-500 relative">
                    @if ($fileUrl)
                        <!-- Menggunakan object PDF untuk kompatibilitas mobile & desktop -->
                        <object data="{{ $fileUrl }}#toolbar=0" type="application/pdf" class="w-full h-full">
                            <!-- Fallback jika browser tidak mendukung object PDF -->
                            <div class="flex flex-col items-center justify-center h-full text-white p-6 text-center">
                                <svg class="w-16 h-16 mb-4 text-gray-300" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                <p class="mb-4 text-lg">Browser Anda tidak mendukung pratinjau PDF langsung.</p>
                                <a href="{{ $fileUrl }}" target="_blank"
                                    class="bg-emerald-500 hover:bg-emerald-600 px-6 py-2.5 rounded-lg font-bold transition-colors">
                                    Buka di Tab Baru
                                </a>
                            </div>
                        </object>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
