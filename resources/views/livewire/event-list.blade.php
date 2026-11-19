<div>
    @if ($events->count() > 0)
        <section id="event" class="py-16 bg-gray-50 scroll-mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="text-center mb-10">
                    <span class="inline-block text-xs font-bold tracking-[0.2em] uppercase text-emerald-600 mb-3">Agenda
                        Mendatang</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-emerald-950 mb-4">Event & Seminar</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Ikuti berbagai kegiatan menarik dari LPPM Unisla.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($events as $event)
                        <div
                            class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col border border-gray-100 overflow-hidden group">
                            <!-- Poster -->
                            <div class="h-48 overflow-hidden bg-gray-100 relative">
                                <img src="{{ Storage::url($event->poster_path) }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                            </div>

                            <!-- Body -->
                            <div class="p-6 flex-grow flex flex-col">
                                <!-- Tanggal Pelaksanaan -->
                                <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider mb-2">
                                    {{ \Carbon\Carbon::parse($event->event_date)->translatedFormat('d F Y') }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mb-2 line-clamp-2">{{ $event->title }}</h3>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-3">{{ $event->description }}</p>

                                <!-- Info Pendaftaran -->
                                <div class="mt-auto pt-4 border-t border-gray-100">
                                    <div class="flex items-center gap-2 text-sm text-gray-600 mb-4">
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <span>Pendaftaran:
                                            {{ \Carbon\Carbon::parse($event->registration_start)->format('d M') }} -
                                            {{ \Carbon\Carbon::parse($event->registration_end)->format('d M Y') }}</span>
                                    </div>

                                    @php
                                        $isRegistrationOpen = now()->between(
                                            $event->registration_start,
                                            $event->registration_end,
                                        );
                                    @endphp

                                    @if ($isRegistrationOpen)
                                        <a href="{{ route('event.register', $event->id) }}"
                                            class="block w-full text-center bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-4 rounded-xl transition-colors text-sm">
                                            Daftar Sekarang
                                        </a>
                                    @elseif(now()->gt($event->registration_end))
                                        <button disabled
                                            class="block w-full text-center bg-gray-200 text-gray-500 font-semibold py-2.5 px-4 rounded-xl cursor-not-allowed text-sm">
                                            Pendaftaran Ditutup
                                        </button>
                                    @else
                                        <button disabled
                                            class="block w-full text-center bg-gray-200 text-gray-500 font-semibold py-2.5 px-4 rounded-xl cursor-not-allowed text-sm">
                                            Pendaftaran Belum Dibuka
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</div>
