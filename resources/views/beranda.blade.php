@extends('layouts.app')

@section('title', 'Beranda - LPPM UNISLA')

@section('content')
    <!-- 1. HERO SLIDER (Dinamis via Livewire) -->
    <livewire:hero-slider />

    <!-- 2. STATISTIK CARD (Floating di atas hero) -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-15 relative z-20">
        <div
            class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl shadow-emerald-900/5 border border-emerald-100/60 p-6 sm:p-8 grid grid-cols-2 md:grid-cols-4 gap-6 sm:gap-8">
            <!-- Card 1 -->
            <div class="group text-center">
                <div
                    class="mx-auto mb-3 w-12 h-12 flex items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-emerald-950">450+</h3>
                <p class="text-[11px] sm:text-xs font-semibold text-gray-500 tracking-wider uppercase mt-1">Peneliti Aktif
                </p>
            </div>
            <!-- Card 2 -->
            <div class="group text-center md:border-l md:border-emerald-100/70">
                <div
                    class="mx-auto mb-3 w-12 h-12 flex items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-emerald-950">1,200+</h3>
                <p class="text-[11px] sm:text-xs font-semibold text-gray-500 tracking-wider uppercase mt-1">Judul Riset</p>
            </div>
            <!-- Card 3 -->
            <div class="group text-center md:border-l md:border-emerald-100/70">
                <div
                    class="mx-auto mb-3 w-12 h-12 flex items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-emerald-950">85</h3>
                <p class="text-[11px] sm:text-xs font-semibold text-gray-500 tracking-wider uppercase mt-1">Desa Binaan</p>
            </div>
            <!-- Card 4 -->
            <div class="group text-center md:border-l md:border-emerald-100/70">
                <div
                    class="mx-auto mb-3 w-12 h-12 flex items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl sm:text-3xl font-extrabold text-emerald-950">120+</h3>
                <p class="text-[11px] sm:text-xs font-semibold text-gray-500 tracking-wider uppercase mt-1">Mitra Kerjasama
                </p>
            </div>
        </div>
    </div>

    <!-- 3. FOKUS PENELITIAN (Dinamis) -->
    <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Riset &
                Inovasi</span>
            <h2 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Fokus Penelitian Utama</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">Mengarahkan sumber daya intelektual untuk memecahkan tantangan
                regional dan global melalui lensa nilai-nilai Islam.</p>
        </div>

        @php
            // Ambil data langsung di view untuk sementara (bisa dipindah ke controller/livewire nanti)
            $fokus = \App\Models\ResearchFocus::orderBy('order')->get();
            $featured = $fokus->where('is_featured', true)->first();
            $others = $fokus->where('is_featured', false);
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Card Besar (Featured) -->
            @if ($featured)
                <div
                    class="relative rounded-3xl overflow-hidden group h-[400px] md:h-auto ring-1 ring-emerald-100 shadow-lg shadow-emerald-900/5">
                    <img src="{{ $featured->image ? Storage::url($featured->image) : 'https://images.unsplash.com/photo-1592982537447-7440770cbfc9?q=80&w=2066&auto=format&fit=crop' }}"
                        alt="{{ $featured->title }}"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    <div class="absolute inset-0 bg-gradient-to-t from-emerald-950 via-emerald-950/60 to-transparent"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full">
                        <div
                            class="mb-4 inline-flex items-center justify-center p-3 bg-white/15 backdrop-blur-md border border-white/20 rounded-xl">
                            <svg class="w-7 h-7 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">{{ $featured->title }}</h3>
                        <p class="text-emerald-100/80 line-clamp-3 mb-4">{{ $featured->description }}</p>
                        <button type="button" x-data @click="$dispatch('open-focus-modal', { id: {{ $featured->id }} })"
                            class="inline-flex items-center gap-1.5 text-yellow-300 font-semibold text-sm hover:text-yellow-200 transition-all cursor-pointer">

                            <!-- Teks Normal -->
                            <span wire:loading.remove wire:target="openModal">Pelajari Selengkapnya</span>
                            <!-- Spinner saat loading -->
                            <span wire:loading wire:target="openModal" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-yellow-300" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Memuat...
                            </span>

                            <svg wire:loading.remove wire:target="openModal" class="w-4 h-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                </div>
            @endif

            <!-- Card Kecil -->
            <div class="flex flex-col gap-6">
                @foreach ($others as $item)
                    <div
                        class="bg-white p-7 rounded-3xl shadow-sm border border-emerald-100/70 hover:shadow-lg hover:shadow-emerald-900/5 transition-all duration-300 group">
                        <div
                            class="mb-4 inline-flex items-center justify-center p-3 bg-emerald-50 rounded-xl group-hover:bg-emerald-600 transition-colors duration-300">
                            <svg class="w-6 h-6 text-emerald-600 group-hover:text-white transition-colors duration-300"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-emerald-950 mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $item->description }}</p>
                        <button type="button" x-data @click="$dispatch('open-focus-modal', { id: {{ $item->id }} })"
                            class="inline-flex items-center gap-1.5 text-emerald-700 font-semibold text-sm hover:text-emerald-800 group-hover:gap-2.5 transition-all cursor-pointer">

                            <!-- Teks Normal -->
                            <span wire:loading.remove wire:target="openModal">Pelajari</span>
                            <!-- Spinner saat loading -->
                            <span wire:loading wire:target="openModal" class="flex items-center gap-2">
                                <svg class="animate-spin h-4 w-4 text-emerald-700" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                    </path>
                                </svg>
                                Memuat...
                            </span>

                            <svg wire:loading.remove wire:target="openModal" class="w-4 h-4" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <livewire:research-focus-modal />
@endsection
