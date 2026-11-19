<div class="py-12 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-extrabold text-gray-900 capitalize">
                {{ str_replace('_', ' ', $kategoriSumber) }} - {{ $kategoriKegiatan }}
            </h1>
            <p class="text-gray-500 mt-2">Data dan rekapitulasi usulan hibah.</p>
        </div>

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
