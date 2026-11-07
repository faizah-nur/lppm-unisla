<div class="relative w-full h-screen min-h-[650px] overflow-hidden bg-emerald-950" x-data="{
    activeSlide: 0,
    slides: {{ count($sliders) }},
    init() {
        if (this.slides > 1) {
            setInterval(() => { this.activeSlide = (this.activeSlide + 1) % this.slides }, 6000)
        }
    }
}">

    @forelse($sliders as $index => $slider)
        <!-- Slide Item -->
        <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out"
            x-show="activeSlide === {{ $index }}" x-transition:enter="opacity-0"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="opacity-100"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <!-- Background dekoratif (gradien hijau gelap) -->
            <div class="absolute inset-0 bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800"></div>
            <div class="absolute inset-0 opacity-20"
                style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
            </div>

            <!-- Layout split: konten kiri, gambar kanan -->
            <div class="relative h-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 h-full items-center pt-24 pb-16 lg:py-0">

                    <!-- KONTEN (KIRI) -->
                    <div class="text-white max-w-xl order-2 lg:order-1">
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

                    <!-- GAMBAR UTUH (KANAN) -->
                    <div class="order-1 lg:order-2 flex items-center justify-center lg:justify-end h-full">
                        <div class="relative w-full max-w-md lg:max-w-lg">
                            <!-- Aksen dekoratif di belakang gambar -->
                            <div
                                class="absolute -inset-3 bg-gradient-to-tr from-yellow-400/30 to-emerald-400/30 rounded-3xl blur-2xl">
                            </div>

                            <div
                                class="relative rounded-2xl overflow-hidden ring-1 ring-white/20 shadow-2xl shadow-emerald-950/50 bg-emerald-900">
                                <img src="{{ $slider->image ? Storage::url($slider->image) : 'https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=2070&auto=format&fit=crop' }}"
                                    alt="{{ $slider->title }}" class="w-full h-56 sm:h-72 lg:h-[420px] object-cover">
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
        <div class="absolute bottom-20 left-0 right-0 flex justify-center gap-2 z-10">
            <template x-for="i in slides" :key="i">
                <button @click="activeSlide = i - 1" class="h-2.5 rounded-full transition-all duration-300"
                    :class="activeSlide === (i - 1) ? 'w-8 bg-yellow-400' : 'w-2.5 bg-white/40 hover:bg-white/70'"></button>
            </template>
        </div>
    @endif
</div>
