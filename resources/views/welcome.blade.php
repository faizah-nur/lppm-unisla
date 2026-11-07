<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPPM UNISLA - Lembaga Penelitian dan Pengabdian kepada Masyarakat</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">

                <!-- Logo Section -->
                <div class="flex-shrink-0 flex items-center gap-3">
                    <!-- Ganti src ini nanti dengan logo asli UNISLA -->
                    <img class="h-12 w-auto" src="https://unisla.ac.id/wp-content/uploads/2023/05/logo-unisla.png"
                        alt="Logo UNISLA">
                    <div class="flex flex-col">
                        <span class="font-bold text-xl text-green-800 leading-tight">LPPM</span>
                        <span class="font-semibold text-sm text-gray-600 tracking-wider">UNISLA</span>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Beranda</a>

                    <!-- Dropdown Profil -->
                    <div class="relative group">
                        <button
                            class="flex items-center text-gray-700 hover:text-green-700 font-medium transition-colors duration-200 focus:outline-none">
                            Profil
                            <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown Content -->
                        <div
                            class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 border border-gray-100">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Visi
                                & Misi</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Struktur
                                Organisasi</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Sejarah</a>
                        </div>
                    </div>

                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Peneliti</a>
                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Penelitian</a>
                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Pengabdian</a>
                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Publikasi</a>
                    <a href="#"
                        class="text-gray-700 hover:text-green-700 font-medium transition-colors duration-200">Informasi</a>

                    <!-- Dropdown Layanan -->
                    <div class="relative group">
                        <button
                            class="flex items-center text-gray-700 hover:text-green-700 font-medium transition-colors duration-200 focus:outline-none">
                            Layanan & Download
                            <svg class="ml-1 w-4 h-4 group-hover:rotate-180 transition-transform duration-200"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 border border-gray-100">
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Panduan
                                Penelitian</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Panduan
                                Pengabdian</a>
                            <a href="#"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-green-50 hover:text-green-700">Unduh
                                Template</a>
                        </div>
                    </div>
                </div>

                <!-- Tombol CTA / Login Admin (Desktop) -->
                <div class="hidden md:flex items-center">
                    <a href="/admin"
                        class="bg-green-700 hover:bg-green-800 text-white px-5 py-2.5 rounded-lg font-medium transition-colors duration-200 shadow-sm flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Login Admin
                    </a>
                </div>

                <!-- Mobile menu button -->
                <div class="flex items-center md:hidden">
                    <button type="button" class="text-gray-500 hover:text-green-700 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama (Placeholder) -->
    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-green-900 rounded-2xl p-10 text-center text-white shadow-xl relative overflow-hidden">
            <!-- Efek dekorasi background -->
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>

            <h1 class="text-3xl md:text-4xl font-bold mb-4 relative z-10">Selamat Datang di LPPM UNISLA</h1>
            <p class="text-green-100 max-w-2xl mx-auto relative z-10">Pusat unggulan penelitian dan pengabdian kepada
                masyarakat Universitas Islam Lamongan. Membangun negeri melalui inovasi dan pengabdian.</p>
        </div>
    </main>

</body>

</html>
