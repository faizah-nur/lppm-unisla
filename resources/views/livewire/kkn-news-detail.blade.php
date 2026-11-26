@section('title', $news->title . ' - Warta & Informasi KKN')

<div class="pt-28 pb-12 bg-gray-50 min-h-screen">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Breadcrumb & Back Link -->
        <div class="flex items-center justify-between mb-6">
            <nav class="flex text-sm text-gray-500" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('kkn.informasi') }}" wire:navigate
                            class="hover:text-emerald-600 transition-colors inline-flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                            Informasi KKN
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-gray-700 font-medium truncate max-w-[200px] md:max-w-xs">{{ $news->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <a href="{{ route('kkn.informasi') }}" wire:navigate
                class="hidden sm:inline-flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <div
            class="grid grid-cols-1 lg:grid-cols-2 gap-10 bg-white p-6 md:p-8 rounded-3xl shadow-sm border border-gray-200">

            <!-- Kolom Kiri: Galeri Media -->
            <div>
                <!-- LAYAR UTAMA -->
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
                                <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $videoId }}"
                                    frameborder="0" allowfullscreen></iframe>
                            @else
                                <div class="text-white text-sm">Format video tidak dikenali.</div>
                            @endif
                        @else
                            <!-- Render Gambar -->
                            <img src="{{ Storage::url($activeMedia['url']) }}" alt="{{ $news->title }}"
                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105 cursor-zoom-in">
                        @endif
                    @else
                        <!-- Placeholder jika tidak ada media sama sekali -->
                        <div class="flex flex-col items-center justify-center h-full text-gray-400">
                            <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span>Media tidak tersedia</span>
                        </div>
                    @endif

                    <!-- Spinner Loading -->
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

                <!-- THUMBNAIL GALERI -->
                @if (count($mediaList) > 1)
                    <div class="grid grid-cols-4 gap-3">
                        @foreach ($mediaList as $media)
                            @php
                                $isActive = $activeMedia && $activeMedia['url'] === $media['url'];
                            @endphp

                            <button wire:click="setActiveMedia('{{ $media['type'] }}', '{{ $media['url'] }}')"
                                class="aspect-square bg-gray-100 rounded-xl overflow-hidden border-2 transition-all cursor-pointer relative
                                {{ $isActive ? 'border-emerald-500 ring-2 ring-emerald-200' : 'border-transparent hover:border-emerald-300' }}">

                                @if ($media['type'] === 'video')
                                    <!-- Thumbnail Video (Ikon Play) -->
                                    <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                        <div
                                            class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                                            <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor"
                                                viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z" />
                                            </svg>
                                        </div>
                                    </div>
                                @else
                                    <!-- Thumbnail Gambar -->
                                    <img src="{{ Storage::url($media['url']) }}" alt="Thumbnail"
                                        class="w-full h-full object-cover">
                                @endif
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Kolom Kanan: Informasi Berita -->
            <div class="flex flex-col">
                <span
                    class="inline-block bg-emerald-50 text-emerald-800 text-xs font-bold px-3 py-1 rounded-lg border border-emerald-100 uppercase tracking-wider w-max mb-4">
                    Warta KKN
                </span>

                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">{{ $news->title }}
                </h1>

                <div class="flex items-center gap-2 text-sm text-gray-600 mb-6 pb-6 border-b border-gray-100">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span>Dipublikasikan pada: <strong
                            class="text-gray-900">{{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}</strong></span>
                </div>

                <!-- Isi Berita (Rich Text) -->
                <div class="prose prose-sm sm:prose-base prose-emerald max-w-none text-gray-600 leading-relaxed mb-8">
                    {!! $news->content !!}
                </div>

                <!-- Tombol Kembali -->
                <div class="mt-auto pt-6 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('kkn.informasi') }}" wire:navigate
                        class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali ke Daftar Informasi KKN
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>
