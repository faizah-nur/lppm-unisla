<div class="py-12 bg-gray-50 min-h-screen flex items-center justify-center">
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

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model="full_name" placeholder="Contoh: Dr. Ahmad Fauzi, M.Kom"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5">
                    @error('full_name')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- NIP/NIDN -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">NIP / NIDN <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model="nip_nidn" placeholder="Contoh: 0712345678"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5">
                    @error('nip_nidn')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email Aktif <span
                            class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" placeholder="Contoh: ahmad@unisla.ac.id"
                        class="w-full border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5">
                    <p class="text-xs text-gray-500 mt-1">Sertifikat akan dikirimkan ke alamat email ini.</p>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="pt-4">
                    <button type="submit" wire:loading.attr="disabled"
                        class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-xl transition-colors flex justify-center items-center gap-2">
                        <span wire:loading.remove wire:target="register">Kirim Pendaftaran</span>
                        <span wire:loading wire:target="register">Memproses...</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
