<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-28 pb-32 overflow-hidden">
        <!-- Ornamen dekoratif -->
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px]">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tombol Kembali -->
            <a href="{{ route('informasi') }}" wire:navigate
                class="group inline-flex items-center gap-2 text-emerald-200/80 hover:text-yellow-300 transition-colors mb-8 text-sm font-medium">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar Informasi
            </a>

            <!-- Meta (Tanggal) -->
            <div class="flex flex-wrap items-center gap-3 mb-6">
                <span
                    class="inline-flex items-center gap-1.5 bg-yellow-400/15 text-yellow-300 border border-yellow-400/30 font-semibold px-3 py-1.5 rounded-full text-xs tracking-wider uppercase backdrop-blur-sm">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    {{ \Carbon\Carbon::parse($information->published_at)->translatedFormat('d F Y') }}
                </span>
            </div>

            <!-- Judul -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-extrabold text-white leading-[1.15] tracking-tight">
                {{ $information->title }}
            </h1>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
        <article class="bg-white rounded-3xl shadow-xl shadow-emerald-900/5 border border-gray-100 overflow-hidden">

            <!-- Media (YouTube atau Gambar) -->
            @if ($information->youtube_url)
                @php
                    preg_match(
                        '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                        $information->youtube_url,
                        $match,
                    );
                    $youtubeId = $match[1] ?? null;
                @endphp

                @if ($youtubeId)
                    <div class="aspect-video w-full bg-emerald-950 relative group">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                @endif
            @elseif($information->image)
                <div class="w-full max-h-[500px] overflow-hidden bg-gray-50 border-b border-gray-100">
                    <img src="{{ Storage::url($information->image) }}" alt="{{ $information->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            <!-- Isi Teks -->
            <div class="p-8 md:p-12 lg:p-16">
                <!-- Render HTML dari RichEditor dengan gaya Prose yang disesuaikan -->
                <div
                    class="prose prose-lg prose-emerald max-w-none text-gray-600 leading-relaxed
                            prose-headings:text-emerald-950 prose-headings:font-bold prose-headings:tracking-tight
                            prose-a:text-emerald-600 prose-a:font-semibold prose-a:no-underline hover:prose-a:underline
                            prose-strong:text-emerald-900 prose-strong:font-bold
                            prose-img:rounded-2xl prose-img:shadow-md
                            prose-blockquote:border-l-4 prose-blockquote:border-emerald-500 prose-blockquote:bg-emerald-50/50 prose-blockquote:py-2 prose-blockquote:px-6 prose-blockquote:rounded-r-xl prose-blockquote:not-italic prose-blockquote:text-emerald-900
                            prose-li:marker:text-emerald-500">
                    {!! $information->content !!}
                </div>

                <!-- Footer Artikel / Garis Pemisah -->
                <div class="mt-16 pt-8 border-t border-gray-100 flex items-center justify-between">
                    <p class="text-sm text-gray-400 italic">Dipublikasikan oleh LPPM UNISLA</p>
                </div>
            </div>
        </article>
    </div>
</div>
