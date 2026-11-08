<nav x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)"
    :class="scrolled ? 'bg-emerald-950/90 backdrop-blur-md shadow-lg border-emerald-800/40' :
        'bg-emerald-950/50 backdrop-blur-md border-white/10'"
    class="fixed top-0 left-0 right-0 z-50 border-b transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-15">

            <!-- Logo Section -->
            <a href="/" class="flex-shrink-0 flex items-center gap-3 group cursor-pointer">
                <img class="h-12 w-auto transition-transform duration-300 group-hover:scale-105"
                    src="{{ asset('img/logounisla.png') }}" alt="Logo UNISLA">
                <div class="flex flex-col">
                    <span class="font-bold text-xl text-emerald-400 leading-tight">LPPM</span>
                    <span class="font-semibold text-xs text-amber-400/90 tracking-[0.2em]">UNISLA</span>
                </div>
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
                    <button
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Profil
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>

                    <!-- Menu Dropdown -->
                    <div
                        class="absolute left-0 mt-2 w-48 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="{{ route('profil') }}"
                            class="block px-4 py-2 text-sm font-semibold text-emerald-800 hover:bg-emerald-50/60 rounded-lg mx-2 transition-colors border-b border-gray-100 mb-1">Tentang
                            LPPM</a>
                        <a href="{{ route('profil') }}#visi-misi"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Visi
                            & Misi</a>
                        <a href="{{ route('profil') }}#sejarah"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Sejarah</a>
                        <a href="{{ route('profil') }}#struktur"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Struktur
                            Organisasi</a>
                    </div>
                </div>

                <!-- MENU PENELITI (SUDAH DIPERBARUI) -->
                <a href="{{ route('peneliti.index') }}"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Peneliti
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <a href="#"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Penelitian
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                <a href="#"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Pengabdian
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                <a href="#"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Publikasi
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>
                <a href="#"
                    class="relative px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 group">
                    Informasi
                    <span
                        class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                </a>

                <!-- Dropdown Layanan -->
                <div class="relative group">
                    <button
                        class="relative flex items-center px-3 py-2 text-white/90 hover:text-amber-400 font-medium transition-colors duration-200 focus:outline-none">
                        Layanan & Download
                        <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-300"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                        <span
                            class="absolute left-3 right-3 -bottom-0.5 h-0.5 bg-amber-400 rounded-full scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-52 bg-white/95 backdrop-blur-md rounded-xl shadow-xl shadow-emerald-900/20 py-2 opacity-0 invisible translate-y-2 group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 z-50 border border-white/40">
                        <a href="#"
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Panduan
                            Penelitian</a>
                        <a href="#"
                            class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-emerald-50/60 hover:text-emerald-700 rounded-lg mx-2 transition-colors">Template
                            Dokumen</a>
                    </div>
                </div>
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
