<?php

namespace App\Imports;

use App\Models\Grant;
use App\Models\GrantMember;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class GrantsPenelitianImport implements ToModel, WithHeadingRow, WithChunkReading
{
    public function model(array $row)
    {
        // 1. Tentukan kategori sumber dana berdasarkan teks di Excel
        $kategoriSumber = 'internal'; // default
        if (isset($row['kategori_sumber_dana'])) {
            $sumber = strtolower($row['kategori_sumber_dana']);
            if (str_contains($sumber, 'luar negeri')) {
                $kategoriSumber = 'internasional';
            } elseif (str_contains($sumber, 'pemerintah') || str_contains($sumber, 'perusahaan') || str_contains($sumber, 'swasta')) {
                $kategoriSumber = 'eksternal_dn';
            } elseif (str_contains($sumber, 'mandiri')) {
                $kategoriSumber = 'mandiri';
            } else {
                $kategoriSumber = 'internal';
            }
        }

        // 2. Simpan data utama ke tabel grants
        $grant = Grant::create([
            'kategori_kegiatan' => 'Penelitian',
            'kategori_sumber' => $kategoriSumber,
            
            'sinta_id_ketua' => $row['sinta_id_ketua'] ?? null,
            'nama_ketua' => $row['nama_ketua'] ?? '-',
            'nidn_ketua' => $row['nidn_ketua'] ?? '-',
            'afiliasi_ketua' => $row['afiliasi_ketua'] ?? null,
            
            'judul' => $row['judul'] ?? '-',
            'nama_singkat_skema' => $row['nama_singkat_skema'] ?? null,
            'thn_pertama_usulan' => $row['thn_pertama_usulan'] ?? null,
            'thn_usulan_kegiatan' => $row['thn_usulan_kegiatan'] ?? now()->year,
            'thn_pelaksanaan_kegiatan' => $row['thn_pelaksanaan_kegiatan'] ?? now()->year,
            'lama_kegiatan_tahun' => $row['lama_kegiatantahun'] ?? null, // Sesuaikan dengan heading excel
            'bidang_fokus' => $row['bidang_fokus'] ?? null,
            'nama_skema' => $row['nama_skema'] ?? null,
            'status_usulan' => $row['status_usulan_hanya_didanai'] ?? 'Submitted',
            'target_tkt' => $row['target_tkt'] ?? null,
            'nama_program_hibah' => $row['nama_program_hibah'] ?? null,
            
            'negara_sumber_dana' => $row['negara_sumber_dana'] ?? null,
            'sumber_dana' => $row['sumber_dana'] ?? '-',
            'dana_disetujui' => $row['dana_disetujui'] ?? 0,
            'nama_institusi_penerima_dana' => $row['nama_institusi_penerima_dana'] ?? null,
            'link_kontrak' => $row['link_kontrak'] ?? null,
            
            'nama_mahasiswa' => $row['nama_mahasiswa'] ?? null,
            'nim_mahasiswa' => $row['nim'] ?? null,
            'prodi_mahasiswa' => $row['program_studi'] ?? null, // Sesuaikan dengan heading excel
        ]);

        // 3. Simpan data anggota (member 1 s/d 5) ke tabel grant_members
        for ($i = 1; $i <= 5; $i++) {
            // Cek apakah nama member di kolom tersebut ada isinya
            $namaMember = $row['nama_member'.$i] ?? $row['nama_member_sinta'.$i] ?? null;
            
            // Jika nama kosong, lewati (sesuai instruksi di gambar: "Jika member tidak memiliki SINTA ID maka dikosongkan")
            if (!empty($namaMember)) {
                GrantMember::create([
                    'grant_id' => $grant->id,
                    'sinta_id' => $row['sinta_id_member'.$i] ?? $row['sinta_id_member_sinta'.$i] ?? null,
                    'nidn' => $row['nidn_member'.$i] ?? $row['nidn_member_sinta'.$i] ?? '-',
                    'nama' => $namaMember,
                    'urutan' => $i,
                ]);
            }
        }

        return $grant;
    }

    // Memproses data per 100 baris agar tidak memberatkan server jika file besar
    public function chunkSize(): int
    {
        return 100;
    }
}