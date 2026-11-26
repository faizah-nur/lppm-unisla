<nav x-data="{ scrolled: false, mobileMenuOpen: false }" x-init="$watch('mobileMenuOpen', value => {
    if (value) {
        document.body.classList.add('overflow-hidden');
    } else {
        document.body.classList.remove('overflow-hidden');
    }
})" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="mobileMenuOpen ? 'z-[999]' : 'z-50'" class="fixed top-0 left-0 right-0 transition-all duration-300">

    <!-- 0. LAYER BACKGROUND NAVBAR (Memisahkan backdrop-blur agar tidak mengurung fixed drawer) -->
    <div class="absolute inset-0 transition-all duration-300 pointer-events-none"
        :class="scrolled ? 'bg-emerald-950/95 backdrop-blur-md shadow-lg border-b border-emerald-800/40' :
            'bg-emerald-950/80 backdrop-blur-md border-b border-white/10'">
    </div>

    <!-- BAR NAVIGASI UTAMA (h-16) -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 relative z-10">

            <!-- 1. HAMBURGER MENU (KIRI) - HANYA MOBILE -->
            <div class="flex items-center md:hidden relative z-20">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" aria-label="Menu Utama"
                    class="p-2 -ml-2 rounded-lg text-white/90 hover:text-amber-400 hover:bg-white/10 focus:outline-none transition-colors">
                    <!-- Ikon Buka (Hamburger) -->
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Ikon Tutup (X) -->
                    <svg x-show="mobileMenuOpen" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- 2. LOGO SECTION (TENGAH UNTUK MOBILE, KIRI UNTUK DESKTOP) -->
            <a href="/"
                class="flex-shrink-0 flex items-center gap-3 group cursor-pointer absolute left-1/2 -translate-x-1/2 md:static md:translate-x-0 z-10">
                <img class="h-9 sm:h-10 md:h-12 w-auto max-w-[180px] sm:max-w-none object-contain transition-transform duration-300 group-hover:scale-105"
                    src="{{ asset('img/logo litbang pemas.png') }}" alt="Logo litbangpemas">
            </a>

            <!-- 3. DESKTOP MENU -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                <!-- Dropdown Profil -->
                <div class="relative group">
                    <a href="{{ route('profil') }}" wire:navigate
                        class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                        Profil Litbang
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('profil') }}#visi-misi"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Visi
                            & Misi</a>
                        <a href="{{ route('profil') }}#sejarah"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Sejarah</a>
                        <a href="{{ route('profil') }}#struktur"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Struktur
                            Organisasi</a>
                        <a href="{{ route('kerjasama.directory') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">MoA
                            Kerjasama</a>
                    </div>
                </div>

                <a href="{{ route('peneliti.index') }}"
                    class="relative px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 group">
                    Profil Dosen
                    <span
                        class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <!-- Dropdown Penelitian -->
                <div class="relative group">
                    <a href="#"
                        class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                        Penelitian
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('penelitian.internal') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Hibah
                            Internal</a>
                        <a href="{{ route('penelitian.eksternal') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Eksternal
                            Dalam Negeri</a>
                        <a href="{{ route('penelitian.internasional') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Internasional</a>
                    </div>
                </div>

                <!-- Dropdown Pengabdian -->
                <div class="relative group">
                    <a href="#"
                        class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                        Pengabdian
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('pengabdian.internal') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Hibah
                            Internal</a>
                        <a href="{{ route('pengabdian.eksternal') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Eksternal
                            Dalam Negeri</a>
                        <a href="{{ route('pengabdian.internasional') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Internasional</a>
                    </div>
                </div>

                <!-- Dropdown Publikasi -->
                <div class="relative group">
                    <a href="#"
                        class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                        Publikasi
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('publikasi.jurnal') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Direktori
                            Jurnal</a>
                        <a href="{{ route('publikasi.hki') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">HKI</a>
                        <a href="{{ route('publikasi.buku') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Buku</a>
                    </div>
                </div>

                <!-- Dropdown KKN -->
                <div class="relative group">
                    <a href="#"
                        class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                        KKN
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('kkn.alur') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50/60 rounded-lg mx-2 transition-colors border-b border-gray-100 mb-1">Alur
                            Pendaftaran</a>
                        <a href="{{ route('kkn.skema') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Skema
                            KKN</a>
                        <a href="{{ route('kkn.informasi') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Informasi
                            KKN</a>
                    </div>
                </div>

                <a href="{{ route('produk.directory') }}" wire:navigate
                    class="relative flex items-center px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 focus:outline-none">
                    Produk & Jasa
                    <span
                        class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <a href="{{ route('layanan') }}" wire:navigate
                    class="relative px-2 lg:px-3 py-2 text-white/90 hover:text-amber-400 text-sm lg:text-[15px] font-medium transition-colors duration-200 group">
                    Layanan & Download
                    <span
                        class="absolute left-2 lg:left-3 right-2 lg:right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            </div>

            <!-- 4. TOMBOL LOGIN ADMIN (KANAN) -->
            <div class="hidden md:flex items-center">
                <a href="/admin" aria-label="Login Admin" title="Login Admin"
                    class="group relative inline-flex items-center justify-center w-11 h-11 rounded-xl bg-amber-400/90 hover:bg-amber-300 text-emerald-950 transition-colors duration-200 shadow-sm hover:shadow-md hover:shadow-emerald-900/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a4 4 0 11-8 0 4 4 0 018 0zM5 20a6 6 0 0112 0v1H5v-1z" />
                    </svg>
                    <span
                        class="pointer-events-none absolute top-full mt-2 whitespace-nowrap rounded-lg bg-emerald-950 px-2.5 py-1 text-xs font-medium text-white opacity-0 translate-y-1 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-200">Login
                        Admin</span>
                </a>
            </div>

            <!-- Spacer untuk Mobile agar Logo Tetap di Tengah -->
            <div class="w-8 md:hidden"></div>

        </div>
    </div>

    <!-- ========================================== -->
    <!-- 5. MOBILE MENU DRAWER (SLIDE DARI KIRI)    -->
    <!-- ========================================== -->
    <!-- Backdrop (Area Gelap Menutupi Layar Penuh) -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0" @click="mobileMenuOpen = false"
        class="fixed inset-0 bg-black/70 backdrop-blur-xs z-[998] md:hidden" x-cloak>
    </div>

    <!-- Panel Menu Kiri (Drawer Melayang Layar Penuh) -->
    <div x-show="mobileMenuOpen" x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed inset-y-0 left-0 w-72 sm:w-80 max-w-[85vw] bg-emerald-950 z-[999] md:hidden overflow-y-auto custom-scrollbar shadow-2xl border-r border-emerald-800"
        x-cloak>

        <div class="p-5 flex flex-col min-h-full">
            <!-- Header Drawer -->
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-emerald-800/50">
                <img class="h-9 w-auto" src="{{ asset('img/logo litbang pemas.png') }}" alt="Logo">
                <button type="button" @click="mobileMenuOpen = false" aria-label="Tutup Menu"
                    class="p-1.5 rounded-lg text-white/70 hover:text-white hover:bg-white/10 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Navigasi Mobile -->
            <nav class="flex flex-col space-y-2 text-sm text-gray-200 flex-grow">

                <!-- TAMBAHAN: MENU BERANDA KHUSUS MOBILE -->
                <a href="/" wire:navigate @click="mobileMenuOpen = false"
                    class="py-2 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 font-medium transition-colors">
                    Beranda
                </a>
                <a href="{{ route('profil') }}" wire:navigate @click="mobileMenuOpen = false"
                    class="py-2 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 font-medium transition-colors">
                    Profil Litbang
                </a>
                <a href="{{ route('peneliti.index') }}" wire:navigate @click="mobileMenuOpen = false"
                    class="py-2 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 font-medium transition-colors">
                    Profil Dosen
                </a>

                <!-- Penelitian -->
                <div class="py-2 border-t border-emerald-800/50 mt-2 pt-3">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-2 px-3">
                        Penelitian
                    </span>
                    <a href="{{ route('penelitian.internal') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Hibah Internal
                    </a>
                    <a href="{{ route('penelitian.eksternal') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Eksternal Dalam Negeri
                    </a>
                    <a href="{{ route('penelitian.internasional') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Internasional
                    </a>
                </div>

                <!-- Pengabdian -->
                <div class="py-2 border-t border-emerald-800/50 mt-2 pt-3">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-2 px-3">
                        Pengabdian
                    </span>
                    <a href="{{ route('pengabdian.internal') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Hibah Internal
                    </a>
                    <a href="{{ route('pengabdian.eksternal') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Eksternal Dalam Negeri
                    </a>
                    <a href="{{ route('pengabdian.internasional') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Internasional
                    </a>
                </div>

                <!-- Publikasi -->
                <div class="py-2 border-t border-emerald-800/50 mt-2 pt-3">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-2 px-3">
                        Publikasi
                    </span>
                    <a href="{{ route('publikasi.jurnal') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Direktori Jurnal
                    </a>
                    <a href="{{ route('publikasi.hki') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - HKI
                    </a>
                    <a href="{{ route('publikasi.buku') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Buku
                    </a>
                </div>

                <!-- KKN -->
                <div class="py-2 border-t border-emerald-800/50 mt-2 pt-3">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider block mb-2 px-3">
                        KKN
                    </span>
                    <a href="{{ route('kkn.alur') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Alur Pendaftaran
                    </a>
                    <a href="{{ route('kkn.skema') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Skema KKN
                    </a>
                    <a href="{{ route('kkn.informasi') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="block py-1.5 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 transition-colors">
                        - Informasi KKN
                    </a>
                </div>

                <!-- Produk & Layanan -->
                <div class="py-2 border-t border-emerald-800/50 mt-2 pt-3 flex flex-col space-y-1">
                    <a href="{{ route('produk.directory') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="py-2 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 font-medium transition-colors">
                        Produk & Jasa
                    </a>
                    <a href="{{ route('layanan') }}" wire:navigate @click="mobileMenuOpen = false"
                        class="py-2 px-3 rounded-lg hover:bg-white/10 hover:text-amber-400 font-medium transition-colors">
                        Layanan & Download
                    </a>
                </div>

                <!-- Tombol Admin untuk Mobile -->
                <div class="pt-6 mt-4 border-t border-emerald-800 pb-8">
                    <a href="/admin"
                        class="flex items-center justify-center gap-2 w-full bg-amber-400 hover:bg-amber-300 text-emerald-950 font-bold py-2.5 rounded-xl transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 7a4 4 0 11-8 0 4 4 0 018 0zM5 20a6 6 0 0112 0v1H5v-1z"></path>
                        </svg>
                        Login Admin
                    </a>
                </div>
            </nav>
        </div>
    </div>
    <style>
        /* =========================================
           CUSTOM SCROLLBAR UNTUK TEMA GELAP
           ========================================= */

        /* Untuk Chrome, Edge, Safari (WebKit) */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
            /* Lebar scrollbar dibuat tipis */
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: #022c22;
            /* Warna track (emerald-950 lebih gelap) */
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #10b981;
            /* Warna thumb (emerald-500) */
            border-radius: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #34d399;
            /* Warna thumb saat di-hover (emerald-400) */
        }

        /* Untuk Firefox */
        .custom-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #10b981 #022c22;
            /* thumb track */
        }
    </style>
</nav>
