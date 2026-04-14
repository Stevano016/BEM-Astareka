<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\KalenderEvent;
use Carbon\Carbon;

class KalenderEventSeeder extends Seeder
{
    public function run(): void
    {
        KalenderEvent::create([
            'judul' => 'Rapat Kerja Tahunan',
            'deskripsi' => 'Rapat pembahasan program kerja satu tahun ke depan.',
            'waktu_mulai' => Carbon::now()->addDays(2)->setHour(10)->setMinute(0),
            'waktu_selesai' => Carbon::now()->addDays(2)->setHour(14)->setMinute(0),
            'warna' => '#1a1c1e' // Primary Color
        ]);

        KalenderEvent::create([
            'judul' => 'Webinar Nasional Astareka',
            'deskripsi' => 'Webinar menghadirkan tokoh nasional inspiratif.',
            'waktu_mulai' => Carbon::now()->addDays(5)->setHour(9)->setMinute(0),
            'waktu_selesai' => Carbon::now()->addDays(5)->setHour(12)->setMinute(0),
            'warna' => '#f5c242' // Secondary Color
        ]);
    }
}
