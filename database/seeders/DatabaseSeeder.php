<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Boleh di-comment atau dibiarkan

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Admin LPPM',
            'email' => 'adminlppm@unisla.ac.id',
            'password' => Hash::make('adminLPPMUnisla'), // Jangan lupa di-hash!
        ]);
        // Panggil seeder beranda kita di sini
        $this->call([
            LandingPageSeeder::class,
        ]);
    }
}
