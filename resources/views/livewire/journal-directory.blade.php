@section('title', 'Direktori Jurnal Ilmiah - litbangpemas')

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
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Direktori <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Jurnal
                    Ilmiah</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Kumpulan jurnal ilmiah berkala yang diterbitkan dan dikelola oleh litbangpemas Universitas Islam
                Lamongan.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Grid Jurnal -->
        @if ($journals->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($journals as $journal)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300 border border-gray-200 overflow-hidden flex flex-col group">

                        <!-- Cover Image -->
                        <div class="h-64 overflow-hidden relative border-b border-gray-100 bg-gray-100">
                            <img src="{{ Storage::url($journal->cover_image) }}" alt="Cover {{ $journal->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        </div>

                        <!-- Body Content -->
                        <div class="p-5 flex-grow flex flex-col">
                            <!-- Judul -->
                            <h3
                                class="text-lg font-bold text-gray-900 mb-2 line-clamp-2 leading-tight group-hover:text-emerald-800 transition-colors">
                                {{ $journal->title }}
                            </h3>

                            <!-- Deskripsi -->
                            <p class="text-sm text-gray-500 mb-4 line-clamp-3">
                                {{ $journal->description }}
                            </p>

                            <!-- Tombol Kunjungi -->
                            <div class="mt-auto pt-4 border-t border-gray-100">
                                <a href="{{ $journal->external_url }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group-hover:gap-2.5">
                                    Kunjungi Jurnal
                                    <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Belum ada jurnal</h3>
                <p class="mt-1 text-sm text-gray-500">Data jurnal belum ditambahkan oleh admin.</p>
            </div>
        @endif

    </div>
</div>
