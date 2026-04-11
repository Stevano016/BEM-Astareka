<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProfileBem;

class ProfileBemSeeder extends Seeder
{
    public function run(): void
    {
        $profiles = [
            'visi' => 'Menjadi organisasi mahasiswa yang transformatif, inklusif, dan progresif dalam melayani serta menginspirasi mahasiswa Universitas Sugeng Hartono.',
            'misi' => '1. Memperkuat fungsi advokasi mahasiswa. 2. Menciptakan lingkungan kolaboratif antar organisasi. 3. Mengembangkan potensi minat dan bakat mahasiswa melalui program yang inovatif.',
            'sejarah' => 'BEM USH didirikan sejak awal berdirinya universitas untuk menjadi wadah aspirasi...',
            'tentang_singkat' => 'BEM Universitas Sugeng Hartono berkomitmen untuk menjadi wadah transformatif bagi pengembangan karakter dan kepemimpinan mahasiswa di era digital.',
            'quote_inspirasi' => 'Setiap perubahan besar dimulai dari langkah kecil yang dilakukan bersama-sama.',
            'kontak_email' => 'bem@ush.ac.id',
            'kontak_wa' => '08123456789',
            'alamat' => 'Jl. Dr. Wahidin No. 1, Semarang',
            'sosmed_instagram' => '@bemush',
            'sosmed_linkedin' => 'BEM USH',
            'faq_1_q' => 'Apa itu BEM?',
            'faq_1_a' => 'Badan Eksekutif Mahasiswa adalah organisasi tertinggi di tingkat universitas.',
            'faq_2_q' => 'Bagaimana cara bergabung?',
            'faq_2_a' => 'Kami membuka pendaftaran (Open Recruitment) setiap awal semester ganjil.',
            'faq_3_q' => 'Apakah aspirasi saya rahasia?',
            'faq_3_a' => 'Ya, kami menjaga kerahasiaan identitas pelapor aspirasi jika diinginkan.',
            'faq_4_q' => 'Siapa saja pengurusnya?',
            'faq_4_a' => 'Pengurus BEM terdiri dari mahasiswa berbagai program studi di USH.',
        ];

        foreach ($profiles as $key => $value) {
            ProfileBem::create(['key' => $key, 'value' => $value]);
        }
    }
}
