@php
    $sumberLabels = [
        'internal' => 'Hibah Internal',
        'eksternal_dn' => 'Eksternal Dalam Negeri',
        'internasional' => 'Internasional',
        'mandiri' => 'Mandiri',
    ];
    $sumberLabel = $sumberLabels[$kategoriSumber] ?? ucwords(str_replace('_', ' ', $kategoriSumber));
    $pageTitle = $kategoriKegiatan . ' ' . $sumberLabel . ' - litbangpemas';
@endphp

@section('title', $pageTitle)

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
                @if ($kategoriKegiatan === 'Pengabdian')
                    <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                        </path>
                    </svg>
                @else
                    <svg class="w-8 h-8 text-yellow-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                @endif
            </div>

            <!-- Judul Utama -->
            <h1 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-4 capitalize">
                {{ $kategoriKegiatan }} <span
                    class="bg-gradient-to-r from-yellow-300 to-emerald-300 bg-clip-text text-transparent">{{ $sumberLabel }}</span>
            </h1>

            <!-- Deskripsi -->
            <p class="text-emerald-100/80 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                Data, visualisasi tren pengajuan, rekapitulasi status, dan daftar usulan pendanaan
                {{ strtolower($kategoriKegiatan) }} litbangpemas UNISLA.
            </p>
        </div>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

        <!-- 1. BAGIAN GRAFIK -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Tren Pengajuan (Line Chart) -->
            <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-1">Tren Pengajuan (5 Tahun Terakhir)</h3>
                <p class="text-xs text-gray-500 mb-4">Berdasarkan tahun usulan kegiatan</p>
                <div class="relative h-64 w-full">
                    <canvas id="trenChart"></canvas>
                </div>
            </div>

            <!-- Distribusi Status (Donut Chart) -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col">
                <h3 class="text-lg font-bold text-gray-800 mb-1">Distribusi Status</h3>
                <p class="text-xs text-gray-500 mb-4">Semua usulan {{ $kategoriKegiatan }}</p>
                <div class="relative flex-grow flex items-center justify-center h-64">
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- 2. BAGIAN FILTER & PENCARIAN -->
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-gray-200 mb-6 flex flex-col md:flex-row gap-4">
            <!-- Search -->
            <div class="flex-grow relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text"
                    placeholder="Cari judul, abstrak, ketua..."
                    class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 text-sm">
            </div>

            <!-- Filter Tahun -->
            <select wire:model.live="filterTahun"
                class="w-full md:w-40 border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5 pl-3 pr-10 text-sm text-gray-700">
                <option value="">Semua Tahun</option>
                @foreach ($availableYears as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>

            <!-- Filter Status -->
            <select wire:model.live="filterStatus"
                class="w-full md:w-48 border border-gray-300 rounded-xl shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-2.5 pl-3 pr-10 text-sm text-gray-700">
                <option value="">Semua Status</option>
                <option value="Submitted">Submitted</option>
                <option value="didanai">Didanai</option>
                <option value="Selesai">Selesai</option>
            </select>

            <!-- Tombol Cari (Opsional, karena Livewire sudah otomatis) -->
            <button
                class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2.5 px-6 rounded-xl transition-colors text-sm shadow-sm">
                Cari
            </button>
        </div>

        <!-- 3. TABEL DATA -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr
                            class="bg-gray-50 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-200">
                            <th class="px-4 py-4 w-10 text-center">No</th>
                            <th class="px-4 py-4">Judul</th>
                            <th class="px-4 py-4">Jenis</th>
                            <th class="px-4 py-4">Pemberi Dana</th>
                            <th class="px-4 py-4">Anggota Tim</th>
                            <th class="px-4 py-4">Institusi</th>
                            <th class="px-4 py-4">Leader / NIDN</th>
                            <th class="px-4 py-4">Dana Disetujui</th>
                            <th class="px-4 py-4">Tahun</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        @forelse($grants as $index => $grant)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-4 text-center text-gray-500">{{ $grants->firstItem() + $index }}</td>
                                <td class="px-4 py-4 font-semibold text-gray-800 max-w-xs truncate"
                                    title="{{ $grant->judul }}">
                                    {{ $grant->judul }}
                                </td>
                                <td class="px-4 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 capitalize">
                                        {{ str_replace('_', ' ', $grant->kategori_sumber) }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-gray-600">
                                    {{ $grant->nama_program_hibah ?? $grant->nama_skema }}
                                </td>
                                <td class="px-4 py-4 text-gray-600">
                                    @if ($grant->members->count() > 0)
                                        <div class="flex -space-x-2 overflow-hidden">
                                            @foreach ($grant->members->take(3) as $member)
                                                <div class="inline-block h-6 w-6 rounded-full ring-2 ring-white bg-emerald-500 text-white flex items-center justify-center text-[10px] font-bold"
                                                    title="{{ $member->nama }}">
                                                    {{ substr($member->nama, 0, 1) }}
                                                </div>
                                            @endforeach
                                            @if ($grant->members->count() > 3)
                                                <div
                                                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white bg-gray-300 text-gray-600 flex items-center justify-center text-[10px] font-bold">
                                                    +{{ $grant->members->count() - 3 }}
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-gray-600">{{ $grant->nama_institusi_penerima_dana }}</td>
                                <td class="px-4 py-4">
                                    <div class="font-medium text-gray-800">{{ $grant->nama_ketua }}</div>
                                    <div class="text-xs text-gray-500">{{ $grant->nidn_ketua }}</div>
                                </td>
                                <td class="px-4 py-4 text-gray-600 font-medium">
                                    Rp {{ number_format($grant->dana_disetujui, 0, ',', '.') }}
                                </td>
                                <td class="px-4 py-4 text-gray-600">
                                    {{ $grant->thn_usulan_kegiatan }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="px-4 py-12 text-center text-gray-500">
                                    Tidak ada data {{ $kategoriKegiatan }} untuk kategori {{ $kategoriSumber }}.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-4 py-4 border-t border-gray-100">
                {{ $grants->links() }}
            </div>
        </div>

    </div>

    <!-- SCRIPT UNTUK CHART.JS -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            // Data dari PHP
            const trenLabels = @json($chartLabels);
            const trenValues = @json($chartValues);
            const donutLabels = @json($donutLabels);
            const donutValues = @json($donutValues);

            // 1. Inisialisasi Chart Tren (Line)
            const ctxTren = document.getElementById('trenChart').getContext('2d');
            new Chart(ctxTren, {
                type: 'line',
                data: {
                    labels: trenLabels,
                    datasets: [{
                        label: 'Jumlah Usulan',
                        data: trenValues,
                        borderColor: '#10b981', // Warna emerald
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        tension: 0.4, // Membuat garis melengkung
                        fill: true,
                        pointBackgroundColor: '#10b981',
                        pointRadius: 4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // 2. Inisialisasi Chart Status (Donut)
            const ctxStatus = document.getElementById('statusChart').getContext('2d');
            new Chart(ctxStatus, {
                type: 'doughnut',
                data: {
                    labels: donutLabels,
                    datasets: [{
                        data: donutValues,
                        backgroundColor: [
                            '#f59e0b', // Amber (Submitted)
                            '#10b981', // Emerald (Didanai)
                            '#3b82f6', // Blue (Selesai)
                            '#ef4444' // Red (Ditolak)
                        ],
                        borderWidth: 0,
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '70%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                boxWidth: 8
                            }
                        }
                    }
                }
            });
        });
    </script>
</div>
