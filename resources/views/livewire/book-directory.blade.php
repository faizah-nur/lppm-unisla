@section('title', 'Direktori Buku - litbangpemas')

<div class="bg-gray-50 min-h-screen">
    <!-- 1. HERO SECTION -->
    <div
        class="relative bg-gradient-to-br from-emerald-950 via-emerald-900 to-emerald-800 pt-32 pb-20 text-center text-white border-b border-emerald-800/50 overflow-hidden">
        <!-- Ornamen Dekoratif Latar Belakang -->
        <div class="absolute inset-0 opacity-20 pointer-events-none"
            style="background-image: radial-gradient(circle at 20% 30%, rgba(250,204,21,.35), transparent 40%), radial-gradient(circle at 80% 70%, rgba(16,185,129,.35), transparent 45%);">
        </div>
        <div
            class="absolute inset-0 bg-[linear-gradient(to_right,rgba(255,255,255,.04)_1px,transparent_1px),linear-gradient(to_bottom,rgba(255,255,255,.04)_1px,transparent_1px)] bg-[size:48px_48px] pointer-events-none">
        </div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Ikon Hero -->
            <div
                class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center mx-auto mb-5 border border-white/15 backdrop-blur-sm shadow-inner">
                <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                    </path>
                </svg>
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4">
                Direktori <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">Karya
                    Buku</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Koleksi buku referensi, monograf, dan buku ajar yang ditulis dan diterbitkan oleh sivitas akademika
                Universitas Islam Lamongan.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-12">
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400 group-focus-within:text-emerald-600 transition-colors"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Cari judul buku, penulis, atau ISBN..."
                    class="w-full pl-12 pr-4 py-3.5 bg-white border border-gray-300 rounded-2xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm transition-all">
            </div>
        </div>

        <!-- Grid Buku -->
        @if ($books->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($books as $book)
                    <div
                        class="bg-white rounded-2xl shadow-sm hover:shadow-xl hover:border-emerald-300 transition-all duration-300 border border-gray-200 overflow-hidden flex flex-col group">

                        <!-- Cover -->
                        <div class="aspect-[2/3] bg-gray-100 relative overflow-hidden">
                            @if ($book->cover_image)
                                <img src="{{ Storage::url($book->cover_image) }}" alt="{{ $book->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="flex items-center justify-center h-full text-gray-400">
                                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                        </path>
                                    </svg>
                                </div>
                            @endif

                            <!-- Badge Tahun -->
                            <div
                                class="absolute top-3 right-3 bg-black/70 backdrop-blur-sm text-white text-xs font-bold px-2.5 py-1 rounded-md">
                                {{ $book->year }}
                            </div>
                        </div>

                        <!-- Body -->
                        <div class="p-5 flex-grow flex flex-col">
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider mb-1 block">
                                {{ $book->category ?? 'Buku Umum' }}
                            </span>
                            <h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2 leading-snug group-hover:text-emerald-800 transition-colors"
                                title="{{ $book->title }}">
                                {{ $book->title }}
                            </h3>
                            <p class="text-xs text-gray-500 mb-4 line-clamp-2">
                                <span class="font-semibold text-gray-700">Penulis:</span> {{ $book->author }}
                            </p>

                            <!-- Detail Bawah -->
                            <div
                                class="mt-auto pt-4 border-t border-gray-100 flex flex-col gap-1.5 text-xs text-gray-600">
                                @if ($book->isbn)
                                    <div class="flex justify-between">
                                        <span class="text-gray-400">ISBN</span>
                                        <span class="font-medium text-gray-800">{{ $book->isbn }}</span>
                                    </div>
                                @endif
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Penerbit</span>
                                    <span class="font-medium text-right max-w-[150px] truncate text-gray-800"
                                        title="{{ $book->publisher }}">{{ $book->publisher ?? '-' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-10">
                {{ $books->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-gray-300">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900">Buku tidak ditemukan</h3>
                <p class="mt-1 text-sm text-gray-500">Coba gunakan kata kunci pencarian yang lain.</p>
            </div>
        @endif

    </div>
</div>
