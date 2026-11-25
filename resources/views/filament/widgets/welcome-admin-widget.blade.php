<x-filament-widgets::widget>
    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-emerald-950 via-[#064e3b] to-emerald-900 p-6 sm:p-8 text-white shadow-lg border border-emerald-800/50">
        <!-- Background Ornaments -->
        <div class="absolute -top-12 -right-12 w-48 h-48 rounded-full bg-emerald-500/10 blur-2xl pointer-events-none"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 rounded-full bg-amber-400/10 blur-xl pointer-events-none"></div>

        <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-6">
            <div class="space-y-2 max-w-2xl">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-sm text-xs font-semibold text-emerald-200 border border-white/15">
                    <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                    <span>Portal Administrator &bull; Litbang Pemas</span>
                </div>
                <h1 class="text-xl sm:text-2xl font-bold tracking-tight text-white">
                    Selamat Datang di Panel Litbang Pemas UNISLA!
                </h1>
                <p class="text-xs sm:text-sm text-emerald-100/80 leading-relaxed">
                    Kelola data penelitian, pengabdian, publikasi ilmiah, pendaftaran KKN, serta agenda kegiatan kampus secara terintegrasi dan real-time.
                </p>
            </div>

            <div class="flex flex-wrap items-center gap-2.5 flex-shrink-0">
                <a href="{{ url('/') }}" target="_blank" rel="noopener noreferrer"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/10 hover:bg-white/20 text-white text-xs font-semibold backdrop-blur-sm border border-white/20 transition-all duration-200 hover:scale-[1.02]">
                    <svg class="w-4 h-4 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    <span>Kunjungi Website</span>
                </a>

                <a href="{{ route('filament.admin.resources.information.create') }}"
                    class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-emerald-950 font-bold text-xs transition-all duration-200 shadow-sm hover:scale-[1.02]">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Posting Kegiatan</span>
                </a>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
