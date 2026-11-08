<div>
    <!-- 1. HERO SECTION -->
    <div class="bg-emerald-800 pt-28 pb-16 text-center text-white border-b border-emerald-700/50">
        <div class="max-w-3xl mx-auto px-4">
            <div
                class="w-14 h-14 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/10">
                <svg class="w-7 h-7 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </div>
            <h1 class="text-2xl md:text-4xl font-bold mb-2 tracking-tight">Daftar Peneliti</h1>
            <p class="text-emerald-100/80 text-sm md:text-base max-w-xl mx-auto">Data peneliti Universitas Islam
                Lamongan
                yang terindeks di SINTA.</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10 pb-16">

        <!-- 2. KARTU STATISTIK -->
        <!-- Dikurangi padding dan icon-nya agar lebih ringkas (compact) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-8">
            <!-- Total Peneliti -->
            <div class="bg-white rounded-xl p-4 border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-emerald-50 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-emerald-950">{{ number_format($totalResearchers) }}</h3>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Total Peneliti</p>
                </div>
            </div>

            <!-- Scopus -->
            <div class="bg-white rounded-xl p-4 border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-emerald-950">{{ number_format($totalScopus) }}</h3>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Punya Scopus</p>
                </div>
            </div>

            <!-- GScholar -->
            <div class="bg-white rounded-xl p-4 border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-emerald-950">{{ number_format($totalGS) }}</h3>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Punya GScholar</p>
                </div>
            </div>

            <!-- Rata-rata Skor -->
            <div class="bg-white rounded-xl p-4 border border-gray-100 flex items-center gap-4">
                <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <h3 class="text-xl font-extrabold text-emerald-950">{{ number_format($avgSintaScore) }}</h3>
                    <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider">Rata-rata Score</p>
                </div>
            </div>
        </div>

        <!-- 3. PENCARIAN -->
        <div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4 border-b border-gray-200 pb-4">
            <h2 class="text-xl font-bold text-emerald-950">Profil Peneliti</h2>
            <div class="relative w-full md:w-80">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text"
                    class="block w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm transition-all"
                    placeholder="Cari nama atau program studi...">
            </div>
        </div>

        <!-- 4. GRID KARTU PENELITI -->
        @if ($researchers->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($researchers as $researcher)
                    <div
                        class="bg-white rounded-xl border border-emerald-400 hover:border-emerald-300 transition-colors duration-200 overflow-hidden flex flex-col">

                        <!-- Header Card (Foto & Nama) -->
                        <div class="p-4 flex items-center gap-4 border-b border-gray-100">
                            <div class="flex-shrink-0">
                                @if (str_starts_with($researcher->image_url, 'http'))
                                    <img src="{{ $researcher->image_url }}" alt="{{ $researcher->name }}"
                                        class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                @else
                                    <img src="{{ Storage::url($researcher->image_url) }}" alt="{{ $researcher->name }}"
                                        class="w-12 h-12 rounded-full object-cover border border-gray-200">
                                @endif
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-bold text-gray-900 leading-tight mb-0.5 truncate"
                                    title="{{ $researcher->name }}">{{ $researcher->name }}</h3>
                                <p class="text-[11px] text-gray-500 truncate" title="{{ $researcher->study_program }}">
                                    {{ $researcher->study_program }}</p>
                            </div>
                        </div>

                        <!-- Body Card (Skor dengan Visual Bar Hanya pada SINTA) -->
                        <div class="p-4 flex-1 flex flex-col justify-between bg-white">

                            <!-- SINTA Score -->
                            <div class="mb-4">
                                <div class="flex justify-between items-center mb-1.5">
                                    <span class="text-[10px] font-bold text-gray-500 uppercase tracking-wider">SINTA
                                        Score 3Yr</span>
                                    <span
                                        class="text-sm font-extrabold text-emerald-700">{{ number_format($researcher->sinta_score_3yr) }}</span>
                                </div>
                                <!-- Progress Bar Sinta (Proporsional terhadap skor tertinggi seluruh institusi) -->
                                @php
                                    $score = $researcher->sinta_score_3yr ?? 0;
                                    $percent = $maxSintaScore > 0 ? ($score / $maxSintaScore) * 100 : 0;
                                    $barWidth = $score > 0 ? max(2, min(100, round($percent, 1))) : 0;
                                @endphp
                                <div class="w-full bg-gray-200 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-emerald-600 h-1.5 rounded-full transition-all duration-500 ease-out"
                                        style="width: {{ $barWidth }}%">
                                    </div>
                                </div>
                            </div>

                            <!-- Scopus & GS H-Index (Angka Saja) -->
                            <div class="grid grid-cols-2 gap-3 mb-4 mt-2">
                                <!-- Scopus -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-[9px] text-gray-500 font-medium">Scopus H-Index</span>
                                        <span
                                            class="text-xs font-bold text-gray-900">{{ $researcher->scopus_hindex }}</span>
                                    </div>
                                </div>

                                <!-- GScholar -->
                                <div>
                                    <div class="flex justify-between items-center mb-1">
                                        <span class="text-[9px] text-gray-500 font-medium">GS H-Index</span>
                                        <span
                                            class="text-xs font-bold text-gray-900">{{ $researcher->gs_hindex }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Tombol Lihat Profil -->
                            <a href="{{ $researcher->profile_url }}" target="_blank"
                                class="flex items-center justify-center gap-1.5 w-full bg-emerald-700 hover:bg-emerald-800 text-white text-xs font-semibold py-2 rounded-lg transition-colors mt-auto">
                                Lihat Profil SINTA
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Custom -->
            <div class="mt-8 flex items-center justify-between border-t border-gray-200 pt-6">
                <div class="text-sm text-gray-500">
                    Menampilkan <span class="font-medium text-gray-900">{{ $researchers->firstItem() }}</span> - <span
                        class="font-medium text-gray-900">{{ $researchers->lastItem() }}</span> dari <span
                        class="font-medium text-gray-900">{{ $researchers->total() }}</span> peneliti
                </div>
                <div class="flex space-x-1">
                    <!-- Tombol Previous -->
                    @if ($researchers->onFirstPage())
                        <span
                            class="px-3 py-1.5 text-sm text-gray-400 bg-gray-50 rounded-md border border-gray-200 cursor-not-allowed">Sebelumnya</span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled"
                            class="px-3 py-1.5 text-sm text-gray-700 bg-white hover:bg-gray-50 rounded-md border border-gray-200 transition-colors">Sebelumnya</button>
                    @endif

                    <!-- Tombol Next -->
                    @if ($researchers->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled"
                            class="px-3 py-1.5 text-sm text-gray-700 bg-white hover:bg-gray-50 rounded-md border border-gray-200 transition-colors">Selanjutnya</button>
                    @else
                        <span
                            class="px-3 py-1.5 text-sm text-gray-400 bg-gray-50 rounded-md border border-gray-200 cursor-not-allowed">Selanjutnya</span>
                    @endif
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-16 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                <div
                    class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-3 border border-gray-200">
                    <svg class="w-8 h-8 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-bold text-gray-900 mb-1">Tidak ada peneliti ditemukan</h3>
                <p class="text-sm text-gray-500">Coba gunakan kata kunci lain atau kosongkan kolom pencarian.</p>
            </div>
        @endif

    </div>
</div>
