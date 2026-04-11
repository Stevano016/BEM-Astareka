<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProgramKerja;

class ProgramKerjaSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'nama' => 'ASTA Connect',
                'deskripsi' => 'Platform integrasi kolaborasi antar organisasi mahasiswa se-Universitas Sugeng Hartono.',
                'departemen' => 'Hubungan Luar',
                'icon' => 'hub',
                'bg_style' => 'primary',
                'is_featured' => true,
                'urutan' => 1,
            ],
            [
                'nama' => 'Sugeng Hartono Cup',
                'deskripsi' => 'Ajang kompetisi olahraga terbesar tingkat universitas untuk mengasah sportivitas.',
                'departemen' => 'Minat & Bakat',
                'icon' => 'trophy',
                'bg_style' => 'surface-container-low',
                'is_featured' => false,
                'urutan' => 2,
            ],
            [
                'nama' => 'Digital Academy',
                'deskripsi' => 'Pelatihan intensif hardskill di bidang teknologi dan desain untuk membekali mahasiswa.',
                'departemen' => 'Pendidikan',
                'icon' => 'school',
                'bg_style' => 'secondary-container',
                'is_featured' => false,
                'urutan' => 3,
            ],
            [
                'nama' => 'Aspirasi Rakyat',
                'deskripsi' => 'Program rutin bulanan untuk menampung kritik, saran, dan pengaduan dari seluruh mahasiswa.',
                'departemen' => 'Advokasi',
                'icon' => 'chat_bubble',
                'bg_style' => 'surface-container-highest',
                'is_featured' => false,
                'urutan' => 4,
            ],
        ];

        foreach ($programs as $prog) {
            ProgramKerja::create($prog);
        }
    }
}
