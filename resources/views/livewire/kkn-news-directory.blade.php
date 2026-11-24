@section('title', 'Warta & Informasi KKN - litbangpemas')

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
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Warta & Informasi <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">KKN</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Ikuti pengumuman resmi, jadwal penting, liputan kegiatan, dan dokumentasi program Kuliah Kerja Nyata
                (KKN) Universitas Islam Lamongan.
            </p>
        </div>
    </div>

    <!-- 2. KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Judul Konten & Search -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div class="flex items-center gap-2.5">
                <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Kabar & Pengumuman Terbaru</h2>
            </div>

            <!-- Search Input -->
            <div class="w-full md:w-80 relative flex-shrink-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text"
                        placeholder="Cari berita atau pengumuman..."
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-xs focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition-all">
                </div>
            </div>
        </div>

        <!-- Grid Berita -->
        @if ($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $item)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300 flex flex-col border border-gray-200 overflow-hidden group">

                        <!-- Gambar Cover -->
                        <a href="{{ route('kkn.informasi.detail', $item->id) }}" wire:navigate
                            class="aspect-[16/9] bg-gray-50 relative overflow-hidden block p-2 flex items-center justify-center">
                            @if ($item->cover_image)
                                <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div
                                    class="flex items-center justify-center h-full text-gray-400 bg-gray-100 w-full rounded-xl">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Tag Badge KKN -->
                            <div
                                class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider shadow-sm">
                                KKN
                            </div>
                        </a>

                        <!-- Body Content -->
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3">
                                <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}</span>
                            </div>

                            <a href="{{ route('kkn.informasi.detail', $item->id) }}" wire:navigate class="block">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-snug group-hover:text-emerald-700 transition-colors">
                                    {{ $item->title }}
                                </h3>
                            </a>

                            <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($item->content), 120) }}
                            </p>

                            <!-- Footer -->
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-emerald-700">Warta KKN</span>

                                <a href="{{ route('kkn.informasi.detail', $item->id) }}" wire:navigate
                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group-hover:gap-2.5">
                                    Baca Selengkapnya
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

            <!-- Pagination -->
            <div class="mt-10">
                {{ $news->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                    </path>
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Belum ada warta KKN</h3>
                <p class="mt-1 text-sm text-gray-500">Informasi atau berita seputar kegiatan KKN belum tersedia.</p>
            </div>
        @endif

    </div>
</div>
