@section('title', 'Skema Program KKN - litbangpemas')

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
            <!-- Ikon Hero -->
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-white/15 backdrop-blur-sm shadow-inner">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Skema Program <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">KKN</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Pilihan skema Kuliah Kerja Nyata yang dirancang untuk pengabdian mahasiswa yang solutif, kolaboratif,
                dan berdampak nyata bagi masyarakat.
            </p>
        </div>
    </div>

    <!-- 2. KONTEN UTAMA -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Judul Bagian -->
        <div class="flex items-center gap-2.5 mb-10">
            <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Daftar Skema KKN</h2>
        </div>

        <!-- Looping Semua Skema -->
        @if ($schemes->count() > 0)
            <div class="space-y-12">
                @foreach ($schemes as $scheme)
                    <div
                        class="bg-white rounded-3xl shadow-sm hover:shadow-xl hover:border-emerald-200 transition-all duration-300 border border-gray-200 overflow-hidden">

                        <!-- Hero Header tiap Skema -->
                        <div
                            class="relative bg-gradient-to-r from-emerald-950 via-emerald-900 to-emerald-800 p-8 md:p-10 text-white overflow-hidden">
                            <!-- Aksen radial halus -->
                            <div
                                class="absolute -right-10 -bottom-10 w-64 h-64 bg-emerald-500/10 rounded-full blur-2xl pointer-events-none">
                            </div>

                            <div class="relative">
                                <span
                                    class="inline-block bg-white/15 backdrop-blur-xs text-yellow-300 text-xs font-bold px-3 py-1 rounded-lg border border-white/20 uppercase tracking-wider mb-3">
                                    Skema KKN
                                </span>
                                <h2 class="text-2xl md:text-3xl font-extrabold mb-3">{{ $scheme->title }}</h2>
                                <p class="text-emerald-100/90 text-sm md:text-base leading-relaxed max-w-3xl">
                                    {{ $scheme->description }}</p>

                                <!-- Grid Info -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-6">
                                    <div
                                        class="flex items-center gap-3 bg-white/10 backdrop-blur-xs p-3.5 rounded-xl border border-white/15">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-yellow-400/20 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] uppercase text-emerald-200 font-bold tracking-wider">
                                                Durasi Kegiatan</p>
                                            <p class="text-sm font-semibold text-white">{{ $scheme->duration ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center gap-3 bg-white/10 backdrop-blur-xs p-3.5 rounded-xl border border-white/15">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-emerald-400/20 flex items-center justify-center flex-shrink-0">
                                            <svg class="w-5 h-5 text-emerald-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-[10px] uppercase text-emerald-200 font-bold tracking-wider">
                                                Lokasi Sasaran</p>
                                            <p class="text-sm font-semibold text-white">{{ $scheme->location ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Body Content -->
                        <div class="p-8 md:p-10 bg-white">
                            <h3
                                class="text-lg md:text-xl font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3 flex items-center gap-2">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Persyaratan Peserta
                            </h3>

                            <!-- Render HTML Persyaratan -->
                            <div
                                class="prose prose-sm sm:prose-base prose-emerald max-w-none text-gray-600 mb-8 leading-relaxed">
                                {!! $scheme->requirements ?? '<p class="italic text-gray-400">Belum ada rincian persyaratan yang diunggah.</p>' !!}
                            </div>

                            <!-- Tombol Pendaftaran -->
                            @if ($scheme->registration_url)
                                <div
                                    class="mt-6 pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                                    <span class="text-xs text-gray-500 font-medium">Pastikan Anda telah membaca seluruh
                                        persyaratan sebelum mendaftar.</span>
                                    <a href="{{ $scheme->registration_url }}" target="_blank" rel="noopener noreferrer"
                                        class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-xl transition-all shadow-sm hover:shadow-md">
                                        Daftar Sekarang
                                        <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
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
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Belum ada skema KKN</h3>
                <p class="mt-1 text-sm text-gray-500">Informasi skema program KKN belum tersedia saat ini.</p>
            </div>
        @endif

    </div>
</div>
