<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    public function run(): void
    {
        $structures = [
            ['nama' => 'Aditya Pratama', 'jabatan' => 'Ketua BEM', 'urutan' => 1, 'quote' => 'Visi tanpa eksekusi adalah halusinasi.'],
            ['nama' => 'Siti Aminah', 'jabatan' => 'Wakil Ketua BEM', 'urutan' => 2, 'quote' => 'Bersama kita bisa membawa perubahan.'],
            ['nama' => 'Budi Santoso', 'jabatan' => 'Sekretaris', 'urutan' => 3],
            ['nama' => 'Lestari Putri', 'jabatan' => 'Bendahara', 'urutan' => 4],
            ['nama' => 'Rizky Ramadhan', 'jabatan' => 'Kepala Dept. Advokasi', 'urutan' => 5],
            ['nama' => 'Dina Marlina', 'jabatan' => 'Kepala Dept. Hubungan Luar', 'urutan' => 6],
            ['nama' => 'Fajar Sidik', 'jabatan' => 'Kepala Dept. Minat Bakat', 'urutan' => 7],
            ['nama' => 'Gita Gutawa', 'jabatan' => 'Kepala Dept. Pendidikan', 'urutan' => 8],
            ['nama' => 'Hendra Setiawan', 'jabatan' => 'Kepala Dept. Media', 'urutan' => 9],
            ['nama' => 'Ika Pertiwi', 'jabatan' => 'Kepala Dept. PSDM', 'urutan' => 10],
        ];

        foreach ($structures as $s) {
            StrukturOrganisasi::create($s);
        }
    }
}
