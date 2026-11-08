<div x-data="{ scrollY: 0 }" x-init="window.addEventListener('scroll', () => scrollY = window.scrollY, { passive: true })">
    <!-- ============ HERO SECTION ============ -->
    <div
        class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-28 pb-20 lg:pb-28 overflow-hidden">
        <!-- Pola dekoratif -->
        <div class="absolute inset-0 opacity-20"
            style="background-image: radial-gradient(circle at 15% 20%, rgba(250,204,21,.45), transparent 35%), radial-gradient(circle at 85% 80%, rgba(16,185,129,.5), transparent 40%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px]">
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">

                <!-- ===== TEKS (KIRI) ===== -->
                <div class="text-center lg:text-left order-2 lg:order-1">
                    <!-- Breadcrumb -->
                    <nav class="inline-flex items-center gap-2 text-xs sm:text-sm text-emerald-200/70 mb-6"
                        aria-label="Breadcrumb">
                        <a href="/" class="hover:text-yellow-300 transition-colors">Beranda</a>
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                        <span class="text-emerald-100">Profil</span>
                    </nav>

                    <div
                        class="reveal inline-flex items-center gap-2 bg-yellow-400/15 text-yellow-300 border border-yellow-400/30 font-semibold px-4 py-1.5 rounded-full text-xs sm:text-sm mb-5 backdrop-blur-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-400"></span>
                        Tentang Kami
                    </div>

                    <h1
                        class="reveal text-3xl md:text-4xl lg:text-5xl font-extrabold tracking-tight text-white mb-5 leading-tight">
                        Profil <span
                            class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">LPPM
                            UNISLA</span>
                    </h1>

                    <p
                        class="reveal text-emerald-100/80 text-base md:text-lg leading-relaxed max-w-xl mx-auto lg:mx-0 mb-8">
                        Mengenal lebih dekat Lembaga Penelitian dan Pengabdian kepada Masyarakat
                        Universitas Islam Lamongan.
                    </p>

                    <div class="reveal flex flex-wrap justify-center lg:justify-start gap-3">
                        <a href="#visi-misi"
                            class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-emerald-950 font-bold px-6 py-3 rounded-xl shadow-lg shadow-yellow-500/20 transition-all duration-300 hover:-translate-y-0.5">
                            Visi & Misi
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="#struktur"
                            class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-semibold px-6 py-3 rounded-xl border border-white/20 backdrop-blur-sm transition-colors duration-300">
                            Struktur Organisasi
                        </a>
                    </div>
                </div>

                <!-- ===== GAMBAR KAMPUS (KANAN, ANIMASI) ===== -->
                <div class="order-1 lg:order-2 flex items-center justify-center lg:justify-end">
                    <div class="relative w-full max-w-md lg:max-w-lg">

                        <!-- Glow dekoratif di belakang -->
                        <div
                            class="absolute -inset-6 bg-gradient-to-tr from-yellow-400/30 via-emerald-400/20 to-emerald-500/30 rounded-[2.5rem] blur-3xl animate-pulse-slow">
                        </div>

                        <!-- Blob berputar pelan di belakang gambar -->
                        <div
                            class="absolute -inset-3 bg-gradient-to-tr from-yellow-400/40 to-emerald-400/40 rounded-[2rem] rotate-6 animate-blob">
                        </div>

                        <!-- Kartu gambar dengan parallax halus -->
                        <div class="relative rounded-[2rem] overflow-hidden ring-1 ring-white/20 shadow-2xl shadow-emerald-950/60 bg-emerald-900"
                            :style="`transform: translateY(${Math.min(scrollY * 0.06, 30)}px)`">
                            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=1200&auto=format&fit=crop"
                                alt="Kampus UNISLA"
                                class="w-full h-64 sm:h-80 lg:h-[420px] object-cover transition-transform duration-[1200ms] ease-out hover:scale-105">
                            <!-- Overlay gradien tipis bawah -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-emerald-950/60 via-transparent to-transparent">
                            </div>

                            <!-- Badge floating di pojok -->
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
                                    <p class="text-white font-semibold text-sm truncate">Universitas Islam Lamongan</p>
                                    <p class="text-emerald-200/70 text-xs">Kampus Inovasi & Riset</p>
                                </div>
                            </div>
                        </div>

                        <!-- Ornamen titik-titik dekoratif -->
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


    <!-- ============ KONTEN ============ -->
    <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8 space-y-20">

        <!-- Visi & Misi -->
        <section id="visi-misi" class="scroll-mt-24">
            <div class="text-center mb-10 reveal">
                <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-2">Arah &
                    Tujuan</span>
                <h2 class="text-2xl md:text-3xl font-bold text-emerald-950">Visi & Misi</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Visi -->
                <div
                    class="reveal group relative bg-white p-8 rounded-3xl border border-emerald-100/80 shadow-sm hover:shadow-lg hover:shadow-emerald-900/5 transition-all duration-300">
                    <div
                        class="mb-5 inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-emerald-950 mb-3">Visi</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $profile?->vision ?? 'Belum ada data visi.' }}</p>
                </div>
                <!-- Misi -->
                <div
                    class="reveal group relative bg-white p-8 rounded-3xl border border-emerald-100/80 shadow-sm hover:shadow-lg hover:shadow-emerald-900/5 transition-all duration-300">
                    <div
                        class="mb-5 inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-yellow-50 text-yellow-600 group-hover:bg-yellow-400 group-hover:text-emerald-950 transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-emerald-950 mb-3">Misi</h3>
                    <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                        {{ $profile?->mission ?? 'Belum ada data misi.' }}</p>
                </div>
            </div>
        </section>

        <!-- Sejarah -->
        <section id="sejarah" class="scroll-mt-24">
            <div
                class="reveal relative bg-white p-8 md:p-12 rounded-3xl border border-emerald-100/80 shadow-sm overflow-hidden">
                <!-- Aksen dekoratif -->
                <div class="absolute -top-16 -right-16 w-48 h-48 bg-emerald-50 rounded-full blur-2xl opacity-70"></div>
                <div class="relative">
                    <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-2">Jejak
                        Langkah</span>
                    <h2 class="text-2xl md:text-3xl font-bold text-emerald-950 mb-6">Sejarah</h2>
                    <div
                        class="prose prose-emerald max-w-none text-gray-600 leading-relaxed
                                prose-headings:text-emerald-950 prose-headings:font-bold
                                prose-a:text-emerald-700 prose-a:no-underline hover:prose-a:underline
                                prose-strong:text-emerald-900 prose-li:marker:text-emerald-500">
                        {!! $profile?->history ?? '<p class="text-gray-500 italic">Belum ada data sejarah.</p>' !!}
                    </div>
                </div>
            </div>
        </section>

        <!-- Struktur Organisasi -->
        <section id="struktur" class="scroll-mt-24">
            <div class="text-center mb-10 reveal">
                <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-2">Tim
                    Kami</span>
                <h2 class="text-2xl md:text-3xl font-bold text-emerald-950 mb-2">Struktur Organisasi</h2>
                <p class="text-gray-500">Pengurus LPPM UNISLA periode 2024-2028</p>
            </div>

            @if ($members->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($members as $member)
                        <div
                            class="reveal group bg-white rounded-3xl overflow-hidden border border-emerald-100/80 shadow-sm hover:shadow-xl hover:shadow-emerald-900/5 hover:-translate-y-1 transition-all duration-300">
                            <div class="relative aspect-square bg-emerald-50 overflow-hidden">
                                <img src="{{ $member->image ? Storage::url($member->image) : 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?q=80&w=600&auto=format&fit=crop' }}"
                                    alt="{{ $member->name }}" loading="lazy"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-emerald-950/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                </div>
                            </div>
                            <div class="p-5 text-center">
                                <h3 class="font-bold text-emerald-950 leading-tight mb-1">{{ $member->name }}</h3>
                                <p class="text-[11px] font-semibold text-emerald-600 tracking-wider uppercase">
                                    {{ $member->position }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="reveal text-center py-16 bg-white rounded-3xl border border-dashed border-emerald-200">
                    <div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-emerald-50 flex items-center justify-center">
                        <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <p class="text-gray-500">Belum ada data anggota struktur organisasi.</p>
                </div>
            @endif
        </section>

    </div>

    <style>
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s cubic-bezier(.22, .61, .36, 1), transform .7s cubic-bezier(.22, .61, .36, 1);
            will-change: opacity, transform;
        }

        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Animasi blob berputar halus */
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

        /* Pulse slow untuk glow */
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
            .reveal {
                opacity: 1;
                transform: none;
                transition: none;
            }

            .animate-blob,
            .animate-pulse-slow {
                animation: none;
            }
        }
    </style>

    <script>
        (function() {
            let observer;

            function initReveal() {
                const els = document.querySelectorAll('.reveal:not(.is-visible)');
                if (!els.length) return;
                if (!('IntersectionObserver' in window)) {
                    els.forEach(el => el.classList.add('is-visible'));
                    return;
                }
                if (observer) observer.disconnect();
                observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            const delay = parseInt(entry.target.dataset.delay || 0, 10);
                            setTimeout(() => entry.target.classList.add('is-visible'), delay);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.12,
                    rootMargin: '0px 0px -60px 0px'
                });
                els.forEach(el => observer.observe(el));
            }

            function scrollToTargetHash() {
                if (!window.location.hash) return;
                const targetEl = document.querySelector(window.location.hash);
                if (!targetEl) return;
                const doScroll = () => setTimeout(() => {
                    targetEl.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }, 80);
                if (document.readyState === 'complete') doScroll();
                else window.addEventListener('load', doScroll, {
                    once: true
                });
            }

            document.addEventListener('DOMContentLoaded', () => {
                initReveal();
                scrollToTargetHash();
            });
            window.addEventListener('load', initReveal);
            window.addEventListener('hashchange', scrollToTargetHash);
            document.addEventListener('livewire:navigated', () => {
                initReveal();
                scrollToTargetHash();
            });
            document.addEventListener('livewire:init', () => {
                if (window.Livewire?.hook) Livewire.hook('morph.updated', () => initReveal());
            });
        })();
    </script>
</div>
