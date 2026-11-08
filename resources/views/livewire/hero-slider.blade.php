<div class="relative w-full h-screen min-h-[650px] overflow-hidden bg-emerald-950" x-data="{
    activeSlide: 0,
    slides: {{ count($sliders) }},
    scrollY: 0,
    init() {
        if (this.slides > 1) {
            setInterval(() => { this.activeSlide = (this.activeSlide + 1) % this.slides }, 6000)
        }
        window.addEventListener('scroll', () => this.scrollY = window.scrollY, { passive: true })
    }
}">

    <!-- ============ STYLE ANIMASI (dipindah ke dalam root) ============ -->
    <style>
        @keyframes blob-spin {
            0% {
                transform: rotate(6deg) scale(1);
            }

            50% {
                transform: rotate(10deg) scale(1.03);
            }

            100% {
                transform: rotate(6deg) scale(1);
            }
        }

        .animate-blob {
            animation: blob-spin 8s ease-in-out infinite;
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: .6;
            }

            50% {
                opacity: .9;
            }
        }

        .animate-pulse-slow {
            animation: pulse-slow 5s ease-in-out infinite;
        }

        @media (prefers-reduced-motion: reduce) {

            .animate-blob,
            .animate-pulse-slow {
                animation: none;
            }
        }
    </style>

    @forelse($sliders as $index => $slider)
        <!-- Slide Item -->
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
            x-show="activeSlide === {{ $index }}" x-transition:enter="opacity-0"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <!-- Background dekoratif -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800"></div>
            <div class="absolute inset-0 opacity-20"
                style="background-image: radial-gradient(circle at 15% 20%, rgba(250,204,21,.45), transparent 35%), radial-gradient(circle at 85% 80%, rgba(16,185,129,.5), transparent 40%);">
            </div>
            <div
                class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px]">
            </div>

            <!-- Layout split -->
            <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 h-full items-center pt-24 pb-20 lg:py-0">

                    <!-- KONTEN (KIRI) -->
                    <div class="text-white max-w-xl order-2 lg:order-1 text-center lg:text-left">
                        @if ($slider->tagline)
                            <span
                                class="inline-flex items-center gap-2 bg-yellow-400/15 text-yellow-300 border border-yellow-400/30 font-semibold px-4 py-1.5 rounded-full text-xs sm:text-sm mb-5 backdrop-blur-sm">
                                <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                                {{ $slider->tagline }}
                            </span>
                        @endif

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight mb-5 leading-tight">
                            {{ $slider->title }}
                        </h1>

                        <p class="text-base sm:text-lg text-emerald-100/80 mb-8 leading-relaxed line-clamp-4">
                            {{ $slider->description }}
                        </p>

                        @if ($slider->btn_text)
                            <a href="{{ $slider->btn_link ?? '#' }}"
                                class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-emerald-950 font-bold px-6 py-3 rounded-xl shadow-lg shadow-yellow-500/20 transition-all duration-300 hover:-translate-y-0.5">
                                {{ $slider->btn_text }}
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </a>
                        @endif
                    </div>

                    <!-- GAMBAR KAMPUS (KANAN, ANIMASI) -->
                    <div class="order-1 lg:order-2 flex items-center justify-center lg:justify-end">
                        <div class="relative w-full max-w-md lg:max-w-lg">

                            <!-- Glow dekoratif -->
                            <div
                                class="absolute -inset-6 bg-gradient-to-tr from-yellow-400/30 via-emerald-400/20 to-emerald-500/30 rounded-[2.5rem] blur-3xl animate-pulse-slow">
                            </div>

                            <!-- Blob berputar -->
                            <div
                                class="absolute -inset-3 bg-gradient-to-tr from-yellow-400/40 to-emerald-400/40 rounded-[2rem] rotate-6 animate-blob">
                            </div>

                            <!-- Kartu gambar parallax -->
                            <div class="relative rounded-[2rem] overflow-hidden ring-1 ring-white/20 shadow-2xl shadow-emerald-950/60 bg-emerald-900"
                                :style="`transform: translateY(${Math.min(scrollY * 0.06, 30)}px)`">
                                <img src="{{ $slider->image ? Storage::url($slider->image) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop' }}"
                                    alt="{{ $slider->title }}"
                                    class="w-full h-64 sm:h-80 lg:h-[420px] object-cover transition-transform duration-[1200ms] ease-out hover:scale-105">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-emerald-950/60 via-transparent to-transparent">
                                </div>

                                <!-- Badge floating -->
                                <div
                                    class="absolute bottom-4 left-4 right-4 flex items-center gap-3 bg-emerald-950/60 backdrop-blur-md border border-white/15 rounded-2xl px-4 py-3">
                                    <div
                                        class="w-10 h-10 rounded-xl bg-yellow-400/20 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-5 h-5 text-yellow-300" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-white font-semibold text-sm truncate">LPPM UNISLA</p>
                                        <p class="text-emerald-200/70 text-xs truncate">
                                            {{ $slider->tagline ?: 'Kampus Inovasi & Riset' }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Ornamen titik -->
                            <div class="absolute -top-4 -right-4 w-24 h-24 opacity-30"
                                style="background-image: radial-gradient(circle, rgba(250,204,21,.9) 1.5px, transparent 1.5px); background-size: 12px 12px;">
                            </div>
                            <div class="absolute -bottom-4 -left-4 w-20 h-20 opacity-30"
                                style="background-image: radial-gradient(circle, rgba(52,211,153,.9) 1.5px, transparent 1.5px); background-size: 12px 12px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <div class="relative h-screen min-h-[650px] flex items-center justify-center text-emerald-200">
            Belum ada data slider.
        </div>
    @endforelse

    <!-- Navigation Dots -->
    @if (count($sliders) > 1)
        <div class="absolute bottom-8 lg:bottom-10 left-0 right-0 flex justify-center gap-2 z-10">
            <template x-for="i in slides" :key="i">
                <button @click="activeSlide = i - 1" aria-label="Ke slide"
                    class="h-2.5 rounded-full transition-all duration-300"
                    :class="activeSlide === (i - 1) ? 'w-8 bg-yellow-400' : 'w-2.5 bg-white/40 hover:bg-white/70'"></button>
            </template>
        </div>
    @endif
</div>
