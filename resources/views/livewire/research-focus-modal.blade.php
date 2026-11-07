<div>
    <!-- Gunakan Alpine.js untuk transisi modal -->
    <div x-data="{ show: @entangle('isOpen') }" x-show="show" @keydown.escape.window="$wire.closeModal()" style="display: none;"
        class="relative z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <!-- Background Backdrop -->
        <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="$wire.closeModal()"
            class="fixed inset-0 bg-emerald-950/60 backdrop-blur-sm transition-opacity cursor-pointer"></div>

        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

                <!-- Modal Panel -->
                <div x-show="show" x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-emerald-100">

                    @if ($fokus)
                        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <!-- Icon -->
                                <div
                                    class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-emerald-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>

                                <!-- Konten -->
                                <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-2xl font-bold leading-6 text-emerald-950" id="modal-title">
                                        {{ $fokus->title }}</h3>
                                    <div class="mt-4">
                                        @if ($fokus->image)
                                            <img src="{{ Storage::url($fokus->image) }}" alt="{{ $fokus->title }}"
                                                class="w-full h-48 object-cover rounded-xl mb-4">
                                        @endif
                                        <p class="text-sm text-gray-600 leading-relaxed">
                                            {{ $fokus->description }}
                                        </p>
                                        <!-- Anda bisa menambahkan info lain di sini nanti (misal: daftar dosen yang terlibat) -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Footer Modal -->
                    <div
                        class="bg-emerald-50/50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-emerald-100">
                        <button wire:click="closeModal" type="button"
                            class="mt-3 inline-flex w-full justify-center items-center gap-2 rounded-xl bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors disabled:opacity-50">

                            <!-- Teks Normal -->
                            <span wire:loading.remove wire:target="closeModal">Tutup</span>
                            <!-- Spinner saat loading -->
                            <span wire:loading wire:target="closeModal" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-gray-700" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Menutup...
                            </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
