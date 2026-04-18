<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KalenderEvent;
use Carbon\Carbon;

class KalenderEventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            // ================= DESEMBER 2025 =================
            [
                'judul' => 'RAPAT PERDANA',
                'deskripsi' => 'Ket: All',
                'waktu_mulai' => '2025-12-06 09:00:00',
                'waktu_selesai' => '2025-12-06 12:00:00',
                'warna' => '#e8a2b1' // Pink
            ],
            [
                'judul' => 'RAPAT NAMA KABINET',
                'deskripsi' => 'Ket: All',
                'waktu_mulai' => '2025-12-08 09:00:00',
                'waktu_selesai' => '2025-12-08 12:00:00',
                'warna' => '#b6d7a8' // Green
            ],
            [
                'judul' => 'RAPAT PROKER',
                'deskripsi' => 'Ket: All',
                'waktu_mulai' => '2025-12-12 09:00:00',
                'waktu_selesai' => '2025-12-12 12:00:00',
                'warna' => '#a4c2f4' // Blue
            ],
            [
                'judul' => 'RAPAT PERDANA UKM',
                'deskripsi' => 'Ket: Dagri',
                'waktu_mulai' => '2025-12-15 09:00:00',
                'waktu_selesai' => '2025-12-15 12:00:00',
                'warna' => '#ea9999' // Red
            ],
            [
                'judul' => 'SEMINAR ENTREPRENEUR',
                'deskripsi' => 'Ket: Volunteer',
                'waktu_mulai' => '2025-12-16 09:00:00',
                'waktu_selesai' => '2025-12-16 15:00:00',
                'warna' => '#ffe599' // Yellow
            ],
            [
                'judul' => 'RAPAT KERJA ORMAWA',
                'deskripsi' => 'Ket: Rektor, BEM, UKM',
                'waktu_mulai' => '2025-12-23 09:00:00',
                'waktu_selesai' => '2025-12-23 15:00:00',
                'warna' => '#f3f3f3' // Gray/White
            ],

            // ================= JANUARI 2026 =================
            [
                'judul' => 'Rapat Diklat BEM',
                'deskripsi' => 'Ket: Panitia Diklat',
                'waktu_mulai' => '2026-01-05 09:00:00',
                'waktu_selesai' => '2026-01-05 12:00:00',
                'warna' => '#ea9999' // Red
            ],
            [
                'judul' => 'Rapat Koordinasi Awal Tahun 2026 BEM-SR',
                'deskripsi' => 'Ket: Pres, Menlu',
                'waktu_mulai' => '2026-01-07 09:00:00',
                'waktu_selesai' => '2026-01-07 12:00:00',
                'warna' => '#9fc5e8' // Blue
            ],
            [
                'judul' => 'Rapat + Kas Rutin',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-01-09 09:00:00',
                'waktu_selesai' => '2026-01-09 11:00:00',
                'warna' => '#fff2cc' // Light Yellow
            ],
            [
                'judul' => 'Dana Usaha BEM',
                'deskripsi' => 'Ket: Bendahara',
                'waktu_mulai' => '2026-01-12 08:00:00',
                'waktu_selesai' => '2026-01-12 17:00:00',
                'warna' => '#d5a6bd' // Purple
            ],
            [
                'judul' => 'Pertemuan ORMAWA',
                'deskripsi' => 'Ket: Dagri, Sekre, Bendahara, Menlu',
                'waktu_mulai' => '2026-01-14 09:00:00',
                'waktu_selesai' => '2026-01-14 13:00:00',
                'warna' => '#b4a7d6' // Darker Purple
            ],
            [
                'judul' => 'Open Internship BEM',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-01-18 08:00:00',
                'waktu_selesai' => '2026-01-18 17:00:00',
                'warna' => '#b6d7a8' // Green
            ],
            [
                'judul' => 'Acara HIPMI',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-01-24 09:00:00',
                'waktu_selesai' => '2026-01-24 15:00:00',
                'warna' => '#ffd966' // Yellow
            ],
            [
                'judul' => 'Wawancara Magang BEM',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-01-26 08:00:00',
                'waktu_selesai' => '2026-01-26 16:00:00',
                'warna' => '#ea9999' // Red
            ],
            [
                'judul' => 'Rapat Perdana Bagi Takjil & Gladi Diklat',
                'deskripsi' => 'Ket: Panitia',
                'waktu_mulai' => '2026-01-30 13:00:00',
                'waktu_selesai' => '2026-01-30 17:00:00',
                'warna' => '#fce5cd' // Light Orange
            ],
            [
                'judul' => 'Diklat BEM',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-01-31 07:00:00',
                'waktu_selesai' => '2026-01-31 17:00:00',
                'warna' => '#cfe2f3' // Light Blue
            ],

            // ================= FEBRUARI 2026 =================
            [
                'judul' => 'KALENDAR KEGIATAN ORMAWA DAN BEM',
                'deskripsi' => 'Ket: Sekre',
                'waktu_mulai' => '2026-02-01 09:00:00',
                'waktu_selesai' => '2026-02-01 12:00:00',
                'warna' => '#fce5cd' // Orange
            ],
            [
                'judul' => 'Rapat BPH',
                'deskripsi' => 'Ket: BPH',
                'waktu_mulai' => '2026-02-03 13:00:00',
                'waktu_selesai' => '2026-02-03 15:00:00',
                'warna' => '#cfe2f3' // Light Blue
            ],
            [
                'judul' => 'WAWANCARA MAGANG BEM',
                'deskripsi' => 'Ket: Koor BEM',
                'waktu_mulai' => '2026-02-02 08:00:00',
                'waktu_selesai' => '2026-02-03 16:00:00', // Multi-day
                'warna' => '#9fc5e8' // Blue
            ],
            [
                'judul' => 'TRAINING MAGANG BEM',
                'deskripsi' => 'Ket: Koor BEM',
                'waktu_mulai' => '2026-02-04 08:00:00',
                'waktu_selesai' => '2026-02-06 16:00:00', // Multi-day
                'warna' => '#d5a6bd' // Pink/Purple
            ],
            [
                'judul' => 'Rapat Koor',
                'deskripsi' => 'Ket: All BEM',
                'waktu_mulai' => '2026-02-10 13:00:00',
                'waktu_selesai' => '2026-02-10 16:00:00',
                'warna' => '#f6b26b' // Orange
            ],
            [
                'judul' => 'RAPAT RUTIN BEM PER TGL 20 & Kas Rutin',
                'deskripsi' => 'Ket: ALL BEM. Kas Rutin (5.000)',
                'waktu_mulai' => '2026-02-18 15:00:00',
                'waktu_selesai' => '2026-02-18 17:00:00',
                'warna' => '#d9ead3' // Green
            ],
            [
                'judul' => 'Silapus + Bukber IIM & Rapat Koor UKM',
                'deskripsi' => 'Ket: DAGRI',
                'waktu_mulai' => '2026-02-25 16:00:00',
                'waktu_selesai' => '2026-02-25 19:00:00',
                'warna' => '#93c47d' // Darker Green
            ],
            [
                'judul' => 'Aspirasi Mahasiswa (Online dan Offline)',
                'deskripsi' => 'Ket: DAGRI (Tanggal fleksibel bulan Februari)',
                'waktu_mulai' => '2026-02-28 08:00:00',
                'waktu_selesai' => '2026-02-28 17:00:00',
                'warna' => '#1a1c1e' // Default
            ],

            // ================= MARET 2026 =================
            [
                'judul' => 'KALENDAR KEGIATAN ORMAWA DAN BEM',
                'deskripsi' => 'Ket: Sekre',
                'waktu_mulai' => '2026-03-01 09:00:00',
                'waktu_selesai' => '2026-03-01 12:00:00',
                'warna' => '#fce5cd' // Orange
            ],
            [
                'judul' => 'Rapat Internal Kementerian',
                'deskripsi' => 'Ket: Koor BEM',
                'waktu_mulai' => '2026-03-01 08:00:00',
                'waktu_selesai' => '2026-03-07 16:00:00',
                'warna' => '#cfe2f3' // Blue
            ],
            [
                'judul' => 'Rapat Proker Bagi Takjil 2',
                'deskripsi' => 'Ket: Panitia',
                'waktu_mulai' => '2026-03-04 13:00:00',
                'waktu_selesai' => '2026-03-04 15:00:00',
                'warna' => '#b4a7d6' // Purple
            ],
            [
                'judul' => 'Rapat Koordinator',
                'deskripsi' => 'Ket: Koor BEM',
                'waktu_mulai' => '2026-03-08 08:00:00',
                'waktu_selesai' => '2026-03-14 16:00:00',
                'warna' => '#f6b26b' // Orange
            ],
            [
                'judul' => 'Bagi-bagi Takjil',
                'deskripsi' => 'Ket: Panitia',
                'waktu_mulai' => '2026-03-13 16:00:00',
                'waktu_selesai' => '2026-03-13 18:00:00',
                'warna' => '#b6d7a8' // Green
            ],
            [
                'judul' => 'RAPAT RUTIN BEM & Kas & Laporan Keuangan',
                'deskripsi' => 'Ket: All BEM / Bendahara',
                'waktu_mulai' => '2026-03-20 15:00:00',
                'waktu_selesai' => '2026-03-20 17:00:00',
                'warna' => '#ea9999' // Red
            ],
            [
                'judul' => 'Foto Feed dan Video Profile',
                'deskripsi' => 'Ket: Kominfo',
                'waktu_mulai' => '2026-03-21 09:00:00', // Diset weekend minggu ke-3
                'waktu_selesai' => '2026-03-22 17:00:00',
                'warna' => '#b6d7a8' // Green
            ],
            [
                'judul' => 'Program Fleksibel Bulan Maret',
                'deskripsi' => 'Dana Usaha, Aspirasi Mahasiswa, Cup Plastik, Kongres, Publish Template Triwulan, Podcast, Sosmed, LinkedIn',
                'waktu_mulai' => '2026-03-31 08:00:00', // Placeholder akhir bulan
                'waktu_selesai' => '2026-03-31 17:00:00',
                'warna' => '#1a1c1e'
            ],

            // ================= APRIL 2026 =================
            [
                'judul' => 'KALENDAR KEGIATAN ORMAWA DAN BEM',
                'deskripsi' => 'Ket: Sekre',
                'waktu_mulai' => '2026-04-01 09:00:00',
                'waktu_selesai' => '2026-04-01 12:00:00',
                'warna' => '#fce5cd' // Orange
            ],
            [
                'judul' => 'RAPAT RUTIN & MANAJEMEN RAPAT',
                'deskripsi' => 'Ket: All BEM, Sekre, Bendahara. Termasuk Kas & Lapkeu.',
                'waktu_mulai' => '2026-04-20 15:00:00',
                'waktu_selesai' => '2026-04-20 18:00:00',
                'warna' => '#9fc5e8' // Blue
            ],
            [
                'judul' => 'Silapus UNIVET (April-Mei)',
                'deskripsi' => 'Ket: Menlu',
                'waktu_mulai' => '2026-04-25 09:00:00',
                'waktu_selesai' => '2026-05-05 17:00:00', // Lintas bulan
                'warna' => '#1a1c1e'
            ],
            [
                'judul' => 'Program Fleksibel Bulan April',
                'deskripsi' => 'Program Cup Gelas Plastik, Aspirasi Mahasiswa, LinkedIn, Sosial Media',
                'waktu_mulai' => '2026-04-30 08:00:00', // Placeholder akhir bulan
                'waktu_selesai' => '2026-04-30 17:00:00',
                'warna' => '#1a1c1e'
            ],
        ];

        // Loop dan Insert ke Database
        foreach ($events as $event) {
            KalenderEvent::create([
                'judul'         => $event['judul'],
                'deskripsi'     => $event['deskripsi'],
                'waktu_mulai'   => Carbon::parse($event['waktu_mulai']),
                'waktu_selesai' => Carbon::parse($event['waktu_selesai']),
                'warna'         => $event['warna'],
            ]);
        }
    }
}