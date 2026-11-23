<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-12">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Inovasi &
                Hilirisasi</span>
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Produk & Jasa</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Kumpulan produk inovatif dan layanan unggulan hasil riset sivitas
                akademika Universitas Islam Lamongan.</p>
        </div>

        <!-- Filter & Search -->
        <div
            class="bg-white p-4 rounded-2xl shadow-sm border border-gray-200 mb-8 flex flex-col md:flex-row gap-4 items-center justify-between">

            <!-- Kategori Pills (Desktop) -->
            <div class="flex flex-wrap items-center gap-2 w-full md:w-auto">
                <button wire:click="$set('filterCategory', '')"
                    class="px-4 py-2 rounded-full text-xs font-semibold transition-colors border {{ $filterCategory === '' ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300' }}">
                    Semua Kategori
                </button>
                @foreach ($categories as $category)
                    <button wire:click="$set('filterCategory', '{{ $category }}')"
                        class="px-4 py-2 rounded-full text-xs font-semibold transition-colors border {{ $filterCategory === $category ? 'bg-emerald-600 text-white border-emerald-600' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300' }}">
                        {{ $category }}
                    </button>
                @endforeach
            </div>

            <!-- Search Input -->
            <div class="w-full md:w-72 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari produk atau pencipta..."
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm">
            </div>
        </div>

        <!-- Grid Produk -->
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-shadow duration-300 border border-gray-200 overflow-hidden flex flex-col group">

                        <!-- Gambar Produk (Cover) -->
                        <div class="aspect-[4/3] bg-gray-100 relative overflow-hidden">
                            @if ($product->cover_image)
                                <img src="{{ Storage::url($product->cover_image) }}" alt="{{ $product->name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Badge Kategori -->
                            <div
                                class="absolute top-3 right-3 bg-white/90 backdrop-blur-sm text-emerald-700 text-[10px] font-bold px-2.5 py-1 rounded-md border border-emerald-100 uppercase tracking-wider shadow-sm">
                                {{ $product->category }}
                            </div>
                        </div>

                        <!-- Body Content -->
                        <div class="p-6 flex-grow flex flex-col">
                            <!-- Judul jadi Link -->
                            <a href="{{ route('produk.detail', $product->id) }}" wire:navigate
                                class="group-hover:text-emerald-600 transition-colors">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 leading-snug"
                                    title="{{ $product->name }}">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <!-- ... (kode pencipta dan deskripsi tetap sama) ... -->

                            <!-- Footer (Tombol Lihat Detail) -->
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <span class="text-xs font-semibold text-gray-400">
                                    {{ \Carbon\Carbon::parse($product->creation_date)->translatedFormat('d M Y') }}
                                </span>

                                <a href="{{ route('produk.detail', $product->id) }}" wire:navigate
                                    class="inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group-hover:gap-2.5">
                                    Lihat Detail
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
                {{ $products->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Belum ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">Data produk atau jasa belum ditambahkan oleh admin.</p>
            </div>
        @endif

    </div>
</div>
