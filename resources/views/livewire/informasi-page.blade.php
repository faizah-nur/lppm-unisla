<div>
    <!-- Hero Section -->
    <div class="bg-emerald-800 py-16 text-center text-white border-b border-emerald-700/50 pt-28">
        <div class="max-w-3xl mx-auto px-4">
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-white/10">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                    </path>
                </svg>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold mb-3">Informasi Kegiatan</h1>
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto">
                Kumpulan informasi kegiatan, acara, dan dokumentasi LPPM UNISLA.
            </p>
        </div>
    </div>

    <!-- Grid Informasi -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($informations as $info)
                <div
                    class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg hover:border-emerald-200 transition-all duration-300 flex flex-col group">

                    <!-- Bagian Atas: Gambar / YouTube -->
                    <a href="{{ route('informasi.detail', $info->id) }}" wire:navigate
                        class="block aspect-[16/10] bg-gray-100 overflow-hidden relative cursor-pointer">
                        @if ($info->youtube_url)
                            <!-- Tampilkan Thumbnail YouTube -->
                            @php
                                // Ekstrak ID video untuk thumbnail
                                preg_match(
                                    '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                                    $info->youtube_url,
                                    $match,
                                );
                                $youtubeId = $match[1] ?? null;
                            @endphp

                            @if ($youtubeId)
                                <img src="https://img.youtube.com/vi/{{ $youtubeId }}/hqdefault.jpg"
                                    alt="{{ $info->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                <!-- Ikon Play -->
                                <div
                                    class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-black/40 transition-colors">
                                    <div
                                        class="w-14 h-14 bg-white/90 rounded-full flex items-center justify-center shadow-lg">
                                        <svg class="w-6 h-6 text-emerald-600 ml-1" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M8 5v14l11-7z" />
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        @elseif($info->image)
                            <!-- Tampilkan Gambar Upload -->
                            <img src="{{ Storage::url($info->image) }}" alt="{{ $info->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        @else
                            <!-- Placeholder -->
                            <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">No
                                Image</div>
                        @endif
                    </a>

                    <!-- Bagian Bawah: Teks -->
                    <div class="p-6 flex-1 flex flex-col">
                        <!-- Tanggal -->
                        <div class="flex items-center gap-2 text-sm text-gray-500 mb-3">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            {{ \Carbon\Carbon::parse($info->published_at)->format('Y-m-d') }}
                        </div>

                        <!-- Judul -->
                        <h3
                            class="text-xl font-bold text-gray-900 mb-3 leading-snug group-hover:text-emerald-700 transition-colors">
                            {{ $info->title }}
                        </h3>

                        <!-- Cuplikan Konten -->
                        <p class="text-gray-600 text-sm mb-6 line-clamp-3">
                            {{ Str::limit(strip_tags($info->content), 120) }}
                        </p>

                        <!-- Tombol Baca -->
                        <a href="{{ route('informasi.detail', $info->id) }}" wire:navigate
                            class="mt-auto inline-flex items-center gap-1.5 text-emerald-700 font-semibold text-sm hover:text-emerald-800 transition-colors">
                            Baca Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-full text-center py-20 text-gray-500 bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    Belum ada informasi kegiatan yang dipublikasikan.
                </div>
            @endforelse
        </div>
    </div>

</div>
