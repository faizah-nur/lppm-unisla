<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Panduan
                Mahasiswa</span>
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Skema KKN</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Pilih dan pahami skema KKN yang sesuai dengan ketentuan akademik
                Anda.</p>
        </div>

        <!-- Looping Semua Skema -->
        <div class="space-y-12">
            @foreach ($schemes as $scheme)
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">

                    <!-- Hero Header tiap Skema -->
                    <div class="bg-emerald-900 p-8 md:p-10 text-white relative">
                        <h2 class="text-2xl md:text-3xl font-extrabold mb-3">{{ $scheme->title }}</h2>
                        <p class="text-emerald-100 text-sm md:text-base leading-relaxed">{{ $scheme->description }}</p>

                        <!-- Grid Info -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            <div
                                class="flex items-center gap-3 bg-emerald-800/50 p-3 rounded-lg border border-emerald-700/50">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-[10px] uppercase text-emerald-300 font-bold tracking-wider">Durasi
                                    </p>
                                    <p class="text-sm font-semibold">{{ $scheme->duration ?? '-' }}</p>
                                </div>
                            </div>
                            <div
                                class="flex items-center gap-3 bg-emerald-800/50 p-3 rounded-lg border border-emerald-700/50">
                                <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <div>
                                    <p class="text-[10px] uppercase text-emerald-300 font-bold tracking-wider">Lokasi
                                    </p>
                                    <p class="text-sm font-semibold">{{ $scheme->location ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Body Content -->
                    <div class="p-8 md:p-10">
                        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Persyaratan
                            Peserta</h3>

                        <!-- Render HTML Persyaratan -->
                        <div class="prose prose-sm sm:prose-base prose-emerald max-w-none text-gray-600 mb-8">
                            {!! $scheme->requirements ?? '<p class="italic text-gray-400">Belum ada persyaratan yang diunggah.</p>' !!}
                        </div>

                        <!-- Tombol Pendaftaran -->
                        @if ($scheme->registration_url)
                            <div class="mt-6 pt-6 border-t border-gray-100">
                                <a href="{{ $scheme->registration_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-xl transition-colors shadow-sm">
                                    Daftar {{ $scheme->title }}
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
