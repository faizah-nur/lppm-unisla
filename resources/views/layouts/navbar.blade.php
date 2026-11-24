<nav x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'bg-emerald-950/90 backdrop-blur-md shadow-lg border-emerald-800/40' :
        'bg-emerald-950/50 backdrop-blur-md border-white/10'"
    class="fixed top-0 left-0 right-0 z-50 border-b transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-15">

            <!-- Logo Section -->
            <a href="/" class="flex-shrink-0 flex items-center gap-3 group cursor-pointer">
                <img class="h-12 w-auto transition-transform duration-300 group-hover:scale-105"
                    src="{{ asset('img/logo litbang pemas.png') }}" alt="Logo litbangpemas">
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-1 lg:space-x-2">
                <a href="/"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Beranda
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <!-- Dropdown Profil -->
                <div class="relative group">
                    <a href="{{ route('profil') }}" wire:navigate
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Profil Litbang
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>

                    <!-- Menu Dropdown Profil -->
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
                        <!-- TAMBAHAN MENU MOA KERJASAMA -->
                        <a href="{{ route('kerjasama.directory') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">MoA
                            Kerjasama</a>
                    </div>
                </div>

                <a href="{{ route('peneliti.index') }}"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Profil Dosen
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <!-- Dropdown Penelitian -->
                <div class="relative group">
                    <a href="#"
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Penelitian
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <!-- Menu Dropdown Penelitian -->
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
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Pengabdian
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <!-- Menu Dropdown Pengabdian -->
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
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Publikasi
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <!-- Menu Dropdown Publikasi -->
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
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        KKN
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                    <!-- Menu Dropdown KKN -->
                    <div
                        class="absolute left-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('kkn.alur') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm font-semibold text-emerald-800 hover:bg-emerald-50/60 rounded-lg mx-2 transition-colors border-b border-gray-100 mb-1">
                            Alur Pendaftaran
                        </a>

                        <!-- Hanya satu tautan untuk Skema KKN -->
                        <a href="{{ route('kkn.skema') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">
                            Skema KKN
                        </a>

                        <a href="{{ route('kkn.informasi') }}" wire:navigate
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">
                            Informasi KKN
                        </a>
                    </div>
                </div>

                <!-- Dropdown Inovasi -->
                <div class="relative group">
                    <a href="{{ route('produk.directory') }}" wire:navigate
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Produk & Jasa
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </a>
                </div>

                <!-- Tautan Layanan & Download (Langsung tanpa dropdown) -->
                <a href="{{ route('layanan') }}" wire:navigate
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Layanan & Download
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
            </div>

            <!-- Tombol Login Admin (Icon Only) -->
            <div class="hidden md:flex items-center">
                <a href="/admin" aria-label="Login Admin" title="Login Admin"
                    class="group relative inline-flex items-center justify-center w-11 h-11 rounded-xl bg-amber-400/90 hover:bg-amber-300 text-emerald-950 transition-colors duration-200 shadow-sm hover:shadow-md hover:shadow-emerald-900/10">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 7a4 4 0 11-8 0 4 4 0 018 0zM5 20a6 6 0 0112 0v1H5v-1z" />
                    </svg>
                    <!-- Tooltip (muncul saat hover) -->
                    <span
                        class="pointer-events-none absolute top-full mt-2 whitespace-nowrap rounded-lg bg-emerald-950 px-2.5 py-1 text-xs font-medium text-white opacity-0 translate-y-1 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-200">
                        Login Admin
                    </span>
                </a>
            </div>

            <!-- Mobile menu button (Hamburger) -->
            <div class="flex items-center md:hidden">
                <button type="button"
                    class="p-2 rounded-lg text-white/90 hover:text-amber-400 hover:bg-white/10 focus:outline-none transition-colors">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>
