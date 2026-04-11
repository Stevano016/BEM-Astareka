<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'tagline' => 'The Digital Curator',
            'judul' => 'The Academic Vanguard of Sugeng Hartono.',
            'judul_aksen' => 'Vanguard',
            'deskripsi' => 'Empowering the student body through visionary leadership, innovative collaboration, and an unwavering commitment to excellence.',
            'is_active' => true,
        ]);
    }
}
