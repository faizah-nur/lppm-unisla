<div class="pt-28 pb-12 bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-3xl w-full mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900">Formulir Pendaftaran</h2>
            <p class="text-emerald-600 font-semibold mt-1">{{ $event->title }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8">

            <!-- Alert Berhasil -->
            @if (session()->has('message'))
                <div
                    class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl mb-6 flex items-center gap-3">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span class="font-medium text-sm">{{ session('message') }}</span>
                </div>
            @endif

            <form wire:submit="register" class="space-y-6">

                <!-- 1. NIP/NIDN (Paling Atas) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">NIP / NIDN <span
                            class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" wire:model.lazy="nip_nidn" wire:blur="checkNidn"
                            placeholder="Masukkan NIDN Anda (Contoh: 0705058807)"
                            class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5 pr-10 px-3">

                        <!-- Indikator Loading -->
                        <div wire:loading wire:target="checkNidn"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <svg class="animate-spin h-5 w-5 text-emerald-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                        </div>

                        <!-- Indikator Valid / Error -->
                        @if ($isNidnValid === true)
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                        @elseif($isNidnValid === false || $isNidnValid === 'error')
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg class="h-5 w-5 text-red-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Pesan Info / Error NIDN -->
                    @if ($nidnMessage)
                        <p
                            class="text-xs mt-1 font-medium {{ $isNidnValid === true ? 'text-emerald-600' : 'text-red-500' }}">
                            {{ $nidnMessage }}
                        </p>
                    @endif
                    @error('nip_nidn')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 2. Nama Lengkap (Otomatis terisi jika NIDN valid) -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model="full_name"
                        placeholder="Nama akan terisi otomatis setelah NIDN divalidasi"
                        {{ $isNidnValid === true ? 'readonly' : '' }}
                        class="w-full border border-gray-300 rounded-xl shadow-sm py-2.5 transition-colors px-3
                        {{ $isNidnValid === true ? 'bg-gray-100 text-gray-600 focus:ring-0 cursor-not-allowed border-gray-200' : 'focus:border-emerald-500 focus:ring-emerald-500' }}">
                    <p class="text-xs text-gray-500 mt-1">Pastikan nama sesuai dengan data SIAKAD.</p>
                    @error('full_name')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- 3. Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Aktif <span
                            class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" placeholder="Contoh: ahmad@unisla.ac.id"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5 px-3">

                    <!-- Info Pengiriman Sertifikat -->
                    <div class="mt-2 flex items-start gap-2 bg-emerald-50 p-3 rounded-lg border border-emerald-100">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        <p class="text-xs text-emerald-800 leading-relaxed">
                            <strong>Penting:</strong> Sertifikat event akan dikirimkan secara otomatis ke alamat email
                            ini setelah event selesai dilaksanakan. Pastikan email yang Anda masukkan aktif dan benar.
                        </p>
                    </div>

                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit" wire:loading.attr="disabled" {{ $isNidnValid !== true ? 'disabled' : '' }}
                        class="w-full font-semibold py-3 px-4 rounded-xl transition-colors flex justify-center items-center gap-2
                        {{ $isNidnValid !== true ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-emerald-600 hover:bg-emerald-700 text-white' }}">
                        <span wire:loading.remove wire:target="register">Kirim Pendaftaran</span>
                        <span wire:loading wire:target="register">Memproses...</span>
                    </button>
                    @if ($isNidnValid !== true)
                        <p class="text-center text-xs text-gray-400 mt-2">Validasi NIDN terlebih dahulu untuk
                            mengaktifkan tombol.</p>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
