<x-filament-panels::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Kolom Kiri: Form Upload -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-6 border-b pb-4">Upload Research</h2>

            <form wire:submit="submit">
                {{ $this->form }}

                <div class="mt-4">
                    <p class="text-sm text-gray-500 mb-4">
                        File Example :
                        <a href="{{ asset('templates/template_penelitian.xlsx') }}" download
                            class="text-amber-500 hover:text-amber-600 font-bold">
                            Download
                        </a>
                    </p>
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-full transition-colors text-sm">
                        Submit New Research
                    </button>
                </div>
            </form>
        </div>

        <!-- Kolom Kanan: Keterangan -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Keterangan</h2>
            <ul class="list-disc list-outside ml-4 space-y-2 text-sm text-gray-600 leading-relaxed">
                <li>Ketua / Leader Wajib Diisi</li>
                <li>Member Maksimal 5 Orang Yang dapat di import. Untuk Member ke 6 dan Seterusnya dapat ditambahkan
                    secara manual melalui claim. Menu Researches > Pilih Research > Klik Judul Research > Pilih Tab
                    Authors > Input nama Author</li>
                <li>Member yang dapat di import wajib memiliki SINTA ID</li>
                <li>Jika member tidak memiliki SINTA ID maka dikosongkan. Contoh Member 2 tidak memiliki SINTA, maka ID,
                    NIDN, Nama pada Member 2 dikosongkan</li>
                <li>Tahun Tidak boleh Kosong</li>
                <li>Kategori Sumber Dana hanya meliputi <strong>(1)Luar Negeri, (2)Pemerintah, Perusahaan/Organisasi
                        Swasta, (3)Institusi Internal, (4)Mandiri</strong>. Penulisan Pada Excel Tidak Menggunakan
                    Angka. Contoh : Institusi Internal</li>
            </ul>
        </div>

    </div>
</x-filament-panels::page>
