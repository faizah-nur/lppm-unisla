<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LPPM UNISLA')</title>

    <!-- Panggil Vite (Tailwind & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 font-sans antialiased text-gray-800 flex flex-col min-h-screen">

    <!-- 1. Include Navbar -->
    @include('layouts.navbar')

    <!-- 2. Konten Utama -->
    <main class="flex-grow">
        @yield('content')
        {{ $slot ?? '' }}
    </main>

    <!-- 3. Include Footer -->
    @include('layouts.footer')

</body>

</html>
