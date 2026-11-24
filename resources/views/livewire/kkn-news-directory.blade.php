<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-12">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Kabar
                Terbaru</span>
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Informasi KKN</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Ikuti perkembangan terbaru seputar kegiatan Kuliah Kerja Nyata
                (KKN) di Universitas Islam Lamongan.</p>
        </div>

        <!-- Search -->
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-emerald-500 transition-colors"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari berita KKN..."
                    class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-2xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm transition-all">
            </div>
        </div>

        <!-- Grid Berita -->
        @if ($news->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($news as $item)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col border border-gray-200 overflow-hidden group">

                        <!-- Gambar Cover -->
                        <a href="{{ route('kkn.informasi.detail', $item->id) }}" wire:navigate
                            class="aspect-[16/9] bg-gray-50 relative overflow-hidden block p-2 flex items-center justify-center">
                            @if ($item->cover_image)
                                <img src="{{ Storage::url($item->cover_image) }}" alt="{{ $item->title }}"
                                    class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400 bg-gray-100 w-full">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </a>

                        <!-- Body -->
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="flex items-center gap-2 text-xs text-gray-500 mb-3">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                            </div>

                            <a href="{{ route('kkn.informasi.detail', $item->id) }}" wire:navigate class="block">
                                <h3
                                    class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 leading-snug group-hover:text-emerald-700 transition-colors">
                                    {{ $item->title }}
                                </h3>
                            </a>

                            <p class="text-gray-500 text-sm mb-6 line-clamp-3">
                                {{ Str::limit(strip_tags($item->content), 120) }}
                            </p>

                            <!-- Footer -->
                            <div class="mt-auto pt-4 border-t border-gray-100">
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
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <p class="text-gray-500">Belum ada berita KKN yang diterbitkan.</p>
            </div>
        @endif

    </div>
</div>
