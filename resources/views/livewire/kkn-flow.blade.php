@section('title', 'Alur Pendaftaran KKN - litbangpemas')

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
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                    </path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Alur Pendaftaran <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">KKN</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Panduan terstruktur langkah demi langkah pendaftaran dan pelaksanaan program Kuliah Kerja Nyata (KKN)
                Universitas Islam Lamongan.
            </p>
        </div>
    </div>

    <!-- 2. KONTEN UTAMA -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Bar Judul Bagian -->
        <div class="flex items-center gap-2.5 mb-10">
            <h2 class="text-xl md:text-2xl font-bold text-emerald-950">Tahapan Pendaftaran & Pelaksanaan</h2>
        </div>

        <!-- Timeline Section -->
        @if ($steps->count() > 0)
            <div class="relative border-l-2 border-emerald-200 ml-4 md:ml-8 space-y-10">
                @foreach ($steps as $index => $step)
                    <div class="relative pl-8 md:pl-12">

                        <!-- Ikon Lingkaran Timeline -->
                        <div
                            class="absolute -left-[23px] top-1.5 bg-white rounded-full p-1 border-2 border-emerald-500 shadow-sm ring-4 ring-emerald-50">
                            <div class="w-8 h-8 bg-emerald-50 rounded-full flex items-center justify-center">
                                @svg('heroicon-o-' . ($step->icon ?? 'document-text'), 'w-4 h-4 text-emerald-700')
                            </div>
                        </div>

                        <!-- Konten Kartu -->
                        <div
                            class="bg-white p-6 md:p-8 rounded-2xl shadow-sm hover:shadow-lg hover:border-emerald-300 transition-all duration-300 border border-gray-200 group">
                            <div class="flex flex-wrap items-center gap-3 mb-3">
                                <span
                                    class="bg-emerald-50 text-emerald-800 text-xs font-bold px-2.5 py-1 rounded-md border border-emerald-200">
                                    Langkah {{ $index + 1 }}
                                </span>
                                <h3
                                    class="text-xl font-bold text-gray-900 group-hover:text-emerald-700 transition-colors">
                                    {{ $step->title }}
                                </h3>
                            </div>

                            <p class="text-gray-600 leading-relaxed text-sm md:text-base mb-5">
                                {{ $step->description }}
                            </p>

                            <!-- Lampiran (Jika Ada) -->
                            @if ($step->file_path || $step->external_url)
                                @php
                                    $link = $step->external_url ?? Storage::url($step->file_path);
                                    $isPdf = $step->file_path && !$step->external_url;
                                @endphp
                                <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                                    class="inline-flex items-center gap-2 px-4 py-2 bg-emerald-50/50 hover:bg-emerald-100/70 border border-emerald-200 hover:border-emerald-300 rounded-xl text-sm font-semibold text-emerald-800 transition-all shadow-xs">
                                    @if ($isPdf)
                                        <svg class="w-4 h-4 text-red-500 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>Unduh Panduan (PDF)</span>
                                    @else
                                        <svg class="w-4 h-4 text-blue-500 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                        <span>Buka Tautan Lampiran</span>
                                    @endif
                                    <svg class="w-3.5 h-3.5 text-emerald-600 transition-transform group-hover:translate-x-0.5"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2">
                    </path>
                </svg>
                <h3 class="text-lg font-bold text-gray-900">Belum ada alur pendaftaran</h3>
                <p class="mt-1 text-sm text-gray-500">Informasi tahapan pendaftaran KKN belum tersedia saat ini.</p>
            </div>
        @endif

    </div>
</div>
