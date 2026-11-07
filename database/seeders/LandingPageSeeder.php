<?php

namespace Database\Seeders;

use App\Models\HeroSlider;
use App\Models\ResearchFocus;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    public function run(): void
    {
        // Data Hero Slider
        HeroSlider::create([
            'tagline' => 'RISET & INOVASI ISLAMI',
            'title' => 'Mengintegrasikan Pengetahuan, Menginspirasi Peradaban.',
            'description' => 'Lembaga Penelitian dan Pengabdian kepada Masyarakat Universitas Islam Lamongan berkomitmen untuk menghasilkan riset berdampak tinggi yang menjunjung nilai-nilai keislaman dan keberlanjutan.',
            // 'image' => null,
            'btn_text' => 'Jelajahi Riset',
            'btn_link' => '#',
            'order' => 1,
            'is_active' => true,
        ]);

        // Data Fokus Penelitian
        ResearchFocus::create([
            'title' => 'Pertanian Berkelanjutan',
            'description' => 'Inovasi agroteknologi untuk ketahanan pangan yang sejalan dengan prinsip konservasi alam dalam Islam.',
            'is_featured' => true,
            'order' => 1,
        ]);

        ResearchFocus::create([
            'title' => 'Pendidikan Islam',
            'description' => 'Pengembangan kurikulum dan metode pengajaran modern berbasis nilai kepesantrenan.',
            'is_featured' => false,
            'order' => 2,
        ]);

        ResearchFocus::create([
            'title' => 'Teknologi Tepat Guna',
            'description' => 'Rekayasa keteknikan untuk solusi praktis permasalahan industri lokal dan masyarakat pedesaan.',
            'is_featured' => false,
            'order' => 3,
        ]);
    }
}
