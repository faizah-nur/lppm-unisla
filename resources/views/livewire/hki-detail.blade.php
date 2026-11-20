@section('title', $hki->judul . ' - HKI litbangpemas')

<div class="bg-gray-50 min-h-screen pb-24">
    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-28 pb-32 overflow-hidden border-b border-emerald-800/50">
        <!-- Ornamen dekoratif -->
        <div class="absolute inset-0 opacity-20 pointer-events-none"
            style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] pointer-events-none">
        </div>

        <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Tombol Kembali -->
            <a href="{{ route('publikasi.hki') }}" wire:navigate
                class="group inline-flex items-center gap-2 text-emerald-200/80 hover:text-yellow-300 transition-colors mb-6 text-sm font-medium">
                <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Daftar HKI
            </a>

            <!-- Meta Badges -->
            <div class="flex flex-wrap items-center gap-2.5 mb-5">
                <span
                    class="inline-flex items-center gap-1.5 bg-yellow-400/20 text-yellow-300 border border-yellow-400/40 font-semibold px-3 py-1 rounded-full text-xs tracking-wider uppercase backdrop-blur-sm">
                    {{ $hki->jenis_ki }}
                </span>
                <span
                    class="inline-flex items-center gap-1.5 bg-emerald-400/20 text-emerald-300 border border-emerald-400/30 font-semibold px-3 py-1 rounded-full text-xs tracking-wider uppercase backdrop-blur-sm">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $hki->status }}
                </span>
                <span
                    class="inline-flex items-center gap-1.5 bg-white/10 text-white/90 border border-white/20 font-semibold px-3 py-1 rounded-full text-xs tracking-wider backdrop-blur-sm">
                    <svg class="w-3.5 h-3.5 text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    Tahun {{ $hki->tahun_permohonan }}
                </span>
            </div>

            <!-- Judul Karya -->
            <h1 class="text-2xl md:text-3xl lg:text-4xl font-extrabold text-white leading-tight tracking-tight">
                {{ $hki->judul }}
            </h1>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">

        <!-- Card Meta Informasi & Aksi -->
        <div class="bg-white rounded-3xl shadow-xl shadow-emerald-950/5 border border-gray-100 p-6 sm:p-8 mb-8">
            <!-- Meta Grid -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 pb-6 border-b border-gray-100">
                <div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Nomor Pencatatan</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $hki->nomor_permohonan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Tanggal Terbit</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ $hki->tanggal_sertifikat ? $hki->tanggal_sertifikat->translatedFormat('d F Y') : '-' }}</p>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Nomor Permohonan</p>
                    <p class="text-sm font-semibold text-gray-800">{{ $hki->nomor_permohonan ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-400 uppercase tracking-wider mb-1">Inventor</p>
                    <p class="text-sm font-semibold text-gray-800 line-clamp-2" title="{{ $hki->inventor }}">
                        {{ $hki->inventor }}</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-wrap items-center gap-3 pt-6">
                <button
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                    </svg>
                    Ijin Berkas
                </button>
                <button
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                    Bukti Originalitas
                </button>
                <button
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 hover:bg-gray-50 transition-colors shadow-sm">
                    <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                    </svg>
                    Lihat di PDKI DJKI
                </button>
            </div>
        </div>

        <!-- Body Content (Grid 2 Kolom) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Kiri: Abstrak -->
            <div class="lg:col-span-2 bg-white rounded-3xl shadow-sm border border-gray-200 p-6 sm:p-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Abstrak
                </h2>
                <div class="prose prose-sm sm:prose-base text-gray-600 leading-relaxed max-w-none">
                    {!! $hki->abstrak ?: '<p class="text-gray-400 italic">Abstrak belum tersedia.</p>' !!}
                </div>
            </div>

            <!-- Kanan: Sidebar Info -->
            <div class="space-y-6">
                <!-- Status Pencatatan -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6">
                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Status Pencatatan</h3>
                    <div class="flex items-center gap-2 mb-6">
                        <span
                            class="bg-yellow-50 text-yellow-700 text-xs font-bold px-3 py-1.5 rounded-full border border-yellow-200 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            {{ $hki->status }}
                        </span>
                    </div>

                    <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                        <span class="text-sm text-gray-500">Jenis KI</span>
                        <span class="text-sm font-bold text-gray-900">{{ $hki->jenis_ki }}</span>
                    </div>
                </div>

                <!-- CTA Ajukan HKI -->
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 text-center">
                    <div class="w-12 h-12 bg-emerald-100/70 text-emerald-700 rounded-2xl flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-sm font-bold text-gray-900 mb-2">Ingin Mencatatkan Karya?</h3>
                    <p class="text-xs text-gray-500 mb-6 leading-relaxed">Tim LPPM litbangpemas mendampingi proses pendaftaran
                        HKI, dari penyiapan dokumen hingga sertifikat resmi terbit.</p>
                    <a href="#"
                        class="inline-flex items-center justify-center w-full gap-2 px-5 py-3 bg-emerald-600 hover:bg-emerald-700 text-white rounded-xl text-sm font-bold transition-colors shadow-md shadow-emerald-900/10">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Ajukan HKI
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
