<div class="py-16 bg-gray-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="text-center mb-16">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Panduan
                Mahasiswa</span>
            <h1 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Alur Pendaftaran KKN</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Ikuti langkah-langkah di bawah ini untuk mendaftar dan mengikuti
                program Kuliah Kerja Nyata (KKN) di Universitas Islam Lamongan.</p>
        </div>

        <!-- Timeline Section -->
        @if ($steps->count() > 0)
            <div class="relative border-l-2 border-emerald-100 ml-4 md:ml-8">
                @foreach ($steps as $index => $step)
                    <div class="mb-12 relative pl-8 md:pl-12">

                        <!-- Ikon Lingkaran -->
                        <div
                            class="absolute -left-[22px] top-1 bg-white rounded-full p-1.5 border-2 border-emerald-500 shadow-sm">
                            <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center">
                                <!-- Render Heroicon berdasarkan nama ikon di database -->
                                @svg('heroicon-o-' . ($step->icon ?? 'document-text'), 'w-5 h-5 text-emerald-600')
                            </div>
                        </div>

                        <!-- Konten Kartu -->
                        <div
                            class="bg-white p-6 md:p-8 rounded-2xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-100 group">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2.5 py-1 rounded-md">
                                    Langkah {{ $index + 1 }}
                                </span>
                                <h3
                                    class="text-xl font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">
                                    {{ $step->title }}
                                </h3>
                            </div>

                            <p class="text-gray-600 leading-relaxed text-sm md:text-base mb-4">
                                {{ $step->description }}
                            </p>

                            <!-- Lampiran (Jika Ada) -->
                            @if ($step->file_path || $step->external_url)
                                @php
                                    $link = $step->external_url ?? Storage::url($step->file_path);
                                    $isPdf = $step->file_path && !$step->external_url;
                                @endphp
                                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-gray-50 hover:bg-emerald-50 border border-gray-200 hover:border-emerald-200 rounded-lg text-sm font-semibold text-gray-700 hover:text-emerald-700 transition-colors">
                                    @if ($isPdf)
                                        <svg class="w-4 h-4 text-red-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        Unduh Dokumen Panduan (PDF)
                                    @else
                                        <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                        Buka Tautan (GDrive)
                                    @endif
                                </a>
                            @endif
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
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Belum ada alur pendaftaran</h3>
                <p class="mt-1 text-sm text-gray-500">Informasi alur pendaftaran KKN belum tersedia saat ini.</p>
            </div>
        @endif

    </div>
</div>
