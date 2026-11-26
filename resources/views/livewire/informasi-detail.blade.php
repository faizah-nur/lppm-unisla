@section('title', $information->title . ' - Informasi Kegiatan')

    <div class="pt-28 pb-16 bg-gray-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Breadcrumb & Tombol Kembali -->
            <div class="flex items-center justify-between mb-6">
                <nav class="flex text-sm text-gray-500" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ url('/#informasi') }}" wire:navigate
                                class="hover:text-emerald-600 transition-colors inline-flex items-center gap-1.5 font-medium">
                                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2
                                        13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                                    </svg>
                                    Informasi Kegiatan
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span
                                    class="text-gray-700 font-medium truncate max-w-[200px] md:max-w-xs">{{ $information->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <a href="{{ url('/#informasi') }}" wire:navigate
                    class="hidden sm:inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- 1. KARTU DETAIL UTAMA (Konsep Product & Jasa) -->
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-200">

                <!-- Kolom Kiri: Galeri Media (Foto Dokumentasi & Video YouTube) -->
                <div>
                    <!-- LAYAR UTAMA MEDIA -->
                    <div
                        class="aspect-[4/3] bg-gray-900 rounded-2xl overflow-hidden mb-4 border border-gray-100 relative group flex items-center justify-center">

                        @if ($activeMedia)
                            @if ($activeMedia['type'] === 'video')
                                <!-- Render Video YouTube -->
                                @php
                                    $videoId = null;
                                    if (
                                        preg_match(
                                            '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                            $activeMedia['url'],
                                            $match,
                                        )
                                    ) {
                                        $videoId = $match[1];
                                    }
                                @endphp

                                @if ($videoId)
                                    <iframe class="w-full h-full"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @else
                                    <div class="text-white text-sm">Format tautan video tidak dikenali.</div>
                                @endif
                            @else
                                <!-- Render Gambar Dokumentasi -->
                                <img src="{{ Storage::url($activeMedia['url']) }}" alt="{{ $information->title }}"
                                    class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105 cursor-zoom-in">
                            @endif
                        @else
                            <!-- Placeholder jika belum ada foto/video -->
                            <div class="flex flex-col items-center justify-center h-full text-gray-400">
                                <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                    </path>
                                </svg>
                                <span class="text-sm">Dokumentasi belum tersedia</span>
                            </div>
                        @endif

                        <!-- Spinner Loading Transisi Media -->
                        <div wire:loading wire:target="setActiveMedia"
                            class="absolute inset-0 bg-white/70 backdrop-blur-sm z-10 flex flex-col items-center justify-center rounded-2xl">
                            <svg class="animate-spin h-10 w-10 text-emerald-600 mb-2" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                    stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor"
                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                </path>
                            </svg>
                            <span class="text-sm font-semibold text-emerald-700">Memuat media...</span>
                        </div>
                    </div>

                    <!-- THUMBNAIL GALERI (Maksimal 3 Foto + Video) -->
                    @if (count($mediaList) > 1)
                        <div class="grid grid-cols-4 gap-3">
                            @foreach ($mediaList as $index => $media)
                                @php
                                    $isActive = $activeMedia && $activeMedia['url'] === $media['url'];
                                @endphp

                                <button wire:click="setActiveMedia('{{ $media['type'] }}', '{{ $media['url'] }}')"
                                    type="button"
                                    class="aspect-square bg-gray-100 rounded-xl overflow-hidden border-2 transition-all cursor-pointer relative
                                {{ $isActive ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-transparent hover:border-emerald-300' }}">

                                    @if ($media['type'] === 'video')
                                        <!-- Thumbnail Video (Ikon Play) -->
                                        <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                            <div
                                                class="w-10 h-10 bg-red-600 rounded-full flex items-center justify-center shadow-md">
                                                <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @else
                                        <!-- Thumbnail Gambar -->
                                        <img src="{{ Storage::url($media['url']) }}"
                                            alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover">
                                    @endif
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Kolom Kanan: Rincian Kegiatan -->
                <div class="flex flex-col">
                    <span
                        class="inline-block bg-emerald-50 text-emerald-800 text-xs font-bold px-3 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider w-max mb-4">
                        Informasi & Agenda Kegiatan
                    </span>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                        {{ $information->title }}
                    </h1>

                    <!-- Tanggal Publikasi -->
                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-100">
                        <svg class="w-5 h-5 text-emerald-600 flex-shrink-0" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <span>Dipublikasikan pada: <strong
                                class="text-gray-900">{{ \Carbon\Carbon::parse($information->published_at)->translatedFormat('d F Y') }}</strong></span>
                    </div>

                    <!-- Isi Uraian Kegiatan (Rich Text) -->
                    <div
                        class="prose prose-sm sm:prose-base prose-emerald max-w-none text-gray-600 leading-relaxed mb-8">
                        {!! $information->content !!}
                    </div>

                    <!-- Tombol Aksi / Kembali -->
                    <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ url('/#informasi') }}" wire:navigate
                            class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali ke Informasi Kegiatan
                        </a>

                        @if ($information->youtube_url)
                            <a href="{{ $information->youtube_url }}" target="_blank" rel="noopener noreferrer"
                                class="inline-flex items-center gap-1.5 text-xs font-semibold text-red-600 hover:text-red-700 bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded-lg border border-red-200 transition-colors">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                </svg>
                                Buka di YouTube
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- 2. BAGIAN INFORMASI & KEGIATAN LAINNYA -->
            @if ($otherInformations->count() > 0)
                <div class="mt-16 pt-12 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-2.5">
                            <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Informasi & Kegiatan Lainnya
                            </h2>
                        </div>

                        <a href="{{ url('/#informasi') }}" wire:navigate
                            class="hidden sm:inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group">
                            Lihat Semua
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </a>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach ($otherInformations as $item)
                            @php
                                $ytId = null;
                                if ($item->youtube_url) {
                                    preg_match(
                                        '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                        $item->youtube_url,
                                        $ytMatches,
                                    );
                                    $ytId = $ytMatches[1] ?? null;
                                }
                            @endphp

                            <div
                                class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-xl hover:border-emerald-300 transition-all duration-300 flex flex-col group">

                                <!-- Bagian Cover Media -->
                                <a href="{{ route('informasi.detail', $item->id) }}" wire:navigate
                                    class="block aspect-[16/10] bg-gray-100 overflow-hidden relative cursor-pointer">

                                    @if ($item->first_image)
                                        <img src="{{ Storage::url($item->first_image) }}" alt="{{ $item->title }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                        @if ($item->youtube_url)
                                            <div
                                                class="absolute bottom-3 left-3 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-md flex items-center gap-1 shadow-sm">
                                                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg>
                                                Video
                                            </div>
                                        @endif
                                    @elseif ($ytId)
                                        <img src="https://img.youtube.com/vi/{{ $ytId }}/hqdefault.jpg"
                                            alt="{{ $item->title }}"
                                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                        <div
                                            class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-colors">
                                            <div
                                                class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center shadow-lg">
                                                <svg class="w-5 h-5 text-emerald-600 ml-0.5" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M8 5v14l11-7z" />
                                                </svg>
                                            </div>
                                        </div>
                                    @else
                                        <div
                                            class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                            <svg class="w-12 h-12" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </div>
                                    @endif

                                    <!-- Badge Tag Kategori -->
                                    <div
                                        class="absolute top-3 right-3 bg-white/95 backdrop-blur-sm text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider shadow-sm">
                                        Kegiatan
                                    </div>
                                </a>

                                <!-- Bagian Bawah: Konten Ringkas -->
                                <div class="p-6 flex-1 flex flex-col">
                                    <!-- Tanggal -->
                                    <div class="flex items-center gap-1.5 text-xs text-gray-500 mb-3">
                                        <svg class="w-4 h-4 text-emerald-600 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}</span>
                                    </div>

                                    <!-- Judul -->
                                    <a href="{{ route('informasi.detail', $item->id) }}" wire:navigate
                                        class="block">
                                        <h3
                                            class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-emerald-700 transition-colors line-clamp-2">
                                            {{ $item->title }}
                                        </h3>
                                    </a>

                                    <!-- Cuplikan Konten -->
                                    <p class="text-gray-600 text-sm mb-6 line-clamp-3 leading-relaxed">
                                        {{ Str::limit(strip_tags($item->content), 110) }}
                                    </p>

                                    <!-- Footer Tombol -->
                                    <a href="{{ route('informasi.detail', $item->id) }}" wire:navigate
                                        class="mt-auto pt-4 border-t border-gray-100 inline-flex items-center gap-1.5 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors group-hover:gap-2.5">
                                        Baca Selengkapnya
                                        <svg class="w-4 h-4 transition-transform" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

        </div>
    </div>
