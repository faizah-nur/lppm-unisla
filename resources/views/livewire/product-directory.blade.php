@section('title', 'Katalog Produk & Jasa - litbangpemas')

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
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Katalog <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Produk &
                    Jasa</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Kumpulan produk inovatif, teknologi tepat guna, dan layanan unggulan hasil riset serta pengabdian
                sivitas akademika Universitas Islam Lamongan.
            </p>
        </div>
    </div>

    <!-- 2. KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Judul Konten & Filter -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div class="flex items-center gap-2.5">
                <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Daftar Inovasi & Layanan</h2>
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
                        placeholder="Cari produk atau pencipta..."
                        class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl shadow-xs focus:outline-none focus:border-emerald-500 focus:ring-2 focus:ring-emerald-500/20 text-sm transition-all">
                </div>
            </div>
        </div>

        <!-- Filter Kategori (Pills) -->
        <div class="flex flex-wrap items-center gap-2 mb-8">
            <button wire:click="$set('filterCategory', '')"
                class="px-5 py-2 rounded-full text-xs font-semibold transition-all border {{ $filterCategory === '' ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300 hover:text-emerald-700' }}">
                Semua Kategori
            </button>
            @foreach ($categories as $category)
                <button wire:click="$set('filterCategory', '{{ $category }}')"
                    class="px-5 py-2 rounded-full text-xs font-semibold transition-all border {{ $filterCategory === $category ? 'bg-emerald-600 text-white border-emerald-600 shadow-sm' : 'bg-white text-gray-600 border-gray-200 hover:border-emerald-300 hover:text-emerald-700' }}">
                    {{ $category }}
                </button>
            @endforeach
        </div>

        <!-- Grid Produk -->
        @if ($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($products as $product)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300 border border-gray-200 overflow-hidden flex flex-col group">

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
                                class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider shadow-sm">
                                {{ $product->category }}
                            </div>
                        </div>

                        <!-- Body Content -->
                        <div class="p-6 flex-grow flex flex-col">
                            <!-- Judul -->
                            <a href="{{ route('produk.detail', $product->id) }}" wire:navigate
                                class="group-hover:text-emerald-700 transition-colors">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-emerald-700 transition-colors"
                                    title="{{ $product->name }}">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <!-- Pencipta -->
                            @if ($product->creator)
                                <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3">
                                    <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span class="truncate">Oleh: <strong
                                            class="text-gray-700">{{ $product->creator }}</strong></span>
                                </div>
                            @endif

                            <!-- Deskripsi Singkat -->
                            <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                                {{ Str::limit(strip_tags($product->description), 110) }}
                            </p>

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
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Belum ada produk</h3>
                <p class="mt-1 text-sm text-gray-500">Data produk atau jasa belum ditambahkan atau tidak sesuai filter.
                </p>
            </div>
        @endif

    </div>
</div>
