@section('title', $product->name . ' - Produk & Jasa')

<div class="pt-28 pb-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb & Back Link -->
        <div class="flex items-center justify-between mb-6">
            <nav class="flex text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('produk.directory') }}" wire:navigate
                            class="hover:text-emerald-600 transition-colors inline-flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Katalog Produk & Jasa
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700 font-medium truncate max-w-[200px] md:max-w-xs">{{ $product->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <a href="{{ route('produk.directory') }}" wire:navigate
                class="hidden sm:inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-200">

            <!-- Kolom Kiri: Galeri Gambar -->
            <div>
                <!-- Gambar Utama (Dinamis) -->
                <div
                    class="aspect-[4/3] bg-gray-50 rounded-2xl overflow-hidden mb-4 border border-gray-100 relative group flex items-center justify-center p-2">

                    @if ($activeImage)
                        <img src="{{ Storage::url($activeImage) }}" alt="{{ $product->name }}"
                            class="w-full h-full object-contain transition-all duration-500 group-hover:scale-105 cursor-zoom-in">
                    @else
                        <div class="flex items-center justify-center h-full text-gray-400">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                        </div>
                    @endif

                    <!-- SPINNER OVERLAY (Hanya muncul saat loading) -->
                    <div wire:loading wire:target="setActiveImage"
                        class="absolute inset-0 bg-white/70 backdrop-blur-sm z-10 flex flex-col items-center justify-center rounded-2xl">
                        <svg class="animate-spin h-10 w-10 text-emerald-600 mb-2" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                        <span class="text-sm font-semibold text-emerald-700">Memuat gambar...</span>
                    </div>
                </div>

                <!-- Thumbnail Galeri (Jika ada lebih dari 1 gambar) -->
                @if ($product->images && count($product->images) > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($product->images as $img)
                            @php
                                $path = is_array($img) ? $img['path'] ?? null : $img;
                                // Cek apakah gambar ini yang sedang aktif
                                $isActive = $activeImage === $path;
                            @endphp

                            @if ($path)
                                <button wire:click="setActiveImage('{{ $path }}')"
                                    class="aspect-square bg-gray-100 rounded-xl overflow-hidden border-2 transition-all cursor-pointer 
                                    {{ $isActive ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-transparent hover:border-emerald-300' }}">
                                    <img src="{{ Storage::url($path) }}" alt="Thumbnail"
                                        class="w-full h-full object-cover">
                                </button>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Informasi Produk -->
            <div class="flex flex-col justify-center">
                <span
                    class="inline-block bg-emerald-50 text-emerald-800 text-xs font-bold px-3 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider w-max mb-4">
                    {{ $product->category }}
                </span>

                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">{{ $product->name }}
                </h1>

                <div class="flex items-center gap-2 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-100">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    <span>Diciptakan oleh: <strong class="text-gray-900">{{ $product->creator }}</strong></span>
                </div>

                <div class="mb-8">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed text-base">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <span class="block text-xs font-semibold text-gray-400 mb-1">Tanggal Rilis</span>
                        <span
                            class="text-sm font-bold text-gray-800">{{ \Carbon\Carbon::parse($product->creation_date)->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="mt-auto space-y-3">
                    @if ($product->link_url)
                        <a href="{{ $product->link_url }}" target="_blank" rel="noopener noreferrer"
                            class="inline-flex items-center justify-center w-full gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3.5 px-6 rounded-xl transition-colors shadow-sm">
                            Kunjungi Tautan Produk
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                </path>
                            </svg>
                        </a>
                    @endif

                    <a href="{{ route('produk.directory') }}" wire:navigate
                        class="inline-flex sm:hidden items-center justify-center w-full gap-2 text-sm font-semibold text-gray-500 hover:text-emerald-700 transition-colors py-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Direktori Produk
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
