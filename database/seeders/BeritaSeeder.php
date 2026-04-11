<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;
use App\Models\User;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();
        if (!$admin) return;

        $posts = [
            [
                'judul' => 'Peluncuran Kabinet Astareka 2024',
                'konten' => '<p>BEM Universitas Sugeng Hartono resmi meluncurkan kabinet baru bernama Astareka...</p>',
                'excerpt' => 'Ketahui lebih lanjut tentang visi misi Kabinet Astareka periode 2024.',
                'kategori' => 'News',
                'is_published' => true,
                'published_at' => now(),
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Workshop Digital Marketing untuk Mahasiswa',
                'konten' => '<p>Era digital menuntut kita untuk melek pemasaran online. Hadiri workshop kami...</p>',
                'excerpt' => 'Pelajari strategi pemasaran digital terbaru langsung dari pakarnya.',
                'kategori' => 'Workshop',
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Sugeng Hartono Cup: Pendaftaran Dibuka!',
                'konten' => '<p>Ayo daftarkan tim olahragamu sekarang juga dan menangkan total hadiah jutaan rupiah!</p>',
                'excerpt' => 'Informasi lengkap pendaftaran dan kategori lomba SH Cup 2024.',
                'kategori' => 'Event',
                'is_published' => true,
                'published_at' => now()->addDays(2),
                'user_id' => $admin->id,
            ],
            [
                'judul' => 'Prestasi Mahasiswa USH di Ajang Nasional',
                'konten' => '<p>Selamat kepada tim robotika USH yang berhasil meraih juara 2 di ajang KRI 2024...</p>',
                'excerpt' => 'Bangga! Mahasiswa USH kembali torehkan prestasi gemilang di tingkat nasional.',
                'kategori' => 'Achievement',
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'user_id' => $admin->id,
            ],
        ];

        foreach ($posts as $p) {
            Berita::create($p);
        }
    }
}
