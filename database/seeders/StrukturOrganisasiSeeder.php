<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan data lama
        StrukturOrganisasi::truncate();

        $data = [
            // KETUA & WAKIL
            [
                'nama' => 'Kevin Dwi Kumara Siri',
                'nim' => '062302029',
                'jabatan' => 'Ketua BEM',
                'urutan' => 1,
            ],
            [
                'nama' => 'Anandio Vebra Kusuma',
                'nim' => '062302058',
                'jabatan' => 'Wakil Ketua BEM',
                'urutan' => 2,
            ],

            // SEKRETARIS (HANYA KEPALA)
            [
                'nama' => 'Latifah',
                'nim' => '062302069',
                'jabatan' => 'Sekretaris',
                'urutan' => 3,
            ],
            
            // BENDAHARA (HANYA KEPALA)
            [
                'nama' => 'Karina Dya Maharani',
                'nim' => '062302055',
                'jabatan' => 'Bendahara',
                'urutan' => 4,
            ],

            // STAFF SEKRETARIAT (PINDAHAN DARI SEKRETARIS)
            [
                'nama' => 'Agra Amatullooh Assyifaanii',
                'nim' => '062402035',
                'jabatan' => 'Staff',
                'departemen' => 'Sekretariat',
                'urutan' => 5,
            ],
            [
                'nama' => 'Jasmine Dealova Putri Farid',
                'nim' => '062504062',
                'jabatan' => 'Staff',
                'departemen' => 'Sekretariat',
                'urutan' => 6,
            ],

            // STAFF BENDAHARA (PINDAHAN DARI BENDAHARA)
            [
                'nama' => 'Orlin Aneira Rivera',
                'nim' => '062402039',
                'jabatan' => 'Staff',
                'departemen' => 'Bendahara',
                'urutan' => 7,
            ],
            [
                'nama' => 'Ayatul Syafa Kamila',
                'nim' => '062504017',
                'jabatan' => 'Staff',
                'departemen' => 'Bendahara',
                'urutan' => 8,
            ],
            [
                'nama' => 'Gania Salma Ainur Rahma',
                'nim' => '062504007',
                'jabatan' => 'Staff',
                'departemen' => 'Bendahara',
                'urutan' => 9,
            ],

            // DIVISI LITBANG
            [
                'nama' => 'Bagas Rista Ananda',
                'nim' => '062301016',
                'jabatan' => 'Ketua Divisi',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 10,
            ],
            [
                'nama' => 'Neyla Vala Kiara Andi',
                'nim' => '062302060',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 11,
            ],
            [
                'nama' => 'Alexandra Calista Putri Ayu',
                'nim' => '062405004',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 12,
            ],
            [
                'nama' => 'Noverita Ikrar Laoli',
                'nim' => '062402036',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 13,
            ],
            [
                'nama' => 'Adiatama Wira Buana',
                'nim' => '062405005',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 14,
            ],
            [
                'nama' => 'Rakae Eka Daneswari',
                'nim' => '062502019',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 15,
            ],
            [
                'nama' => 'Umi Khasanatun',
                'nim' => '062503036',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 16,
            ],
            [
                'nama' => 'Siti Dwi Nurcahyani',
                'nim' => '062504016',
                'jabatan' => 'Staff',
                'departemen' => 'Penelitian & Pengembangan (DN)',
                'urutan' => 17,
            ],

            // DIVISI SOSMAS
            [
                'nama' => 'Siti Hartatik',
                'nim' => '062302051',
                'jabatan' => 'Ketua Divisi',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 18,
            ],
            [
                'nama' => 'Natanael Richie Arahkata',
                'nim' => '062302026',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 19,
            ],
            [
                'nama' => 'Citra Dewi Indra Kwanima',
                'nim' => '062404007',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 20,
            ],
            [
                'nama' => 'Aisyah Nurul Azizah',
                'nim' => '062404012',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 21,
            ],
            [
                'nama' => 'Selly Navina Putty',
                'nim' => '062402013',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 22,
            ],
            [
                'nama' => 'Mutiya Nabilla',
                'nim' => '062503020',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 23,
            ],
            [
                'nama' => 'Meilasari Nur Istiqomah',
                'nim' => '062506002',
                'jabatan' => 'Staff',
                'departemen' => 'Sosmas, Lingkungan & Ekonomi (LN)',
                'urutan' => 24,
            ],

            // DIVISI KOMINFO
            [
                'nama' => 'Aurelius Oddy Nugros',
                'nim' => '062302008',
                'jabatan' => 'Ketua Divisi',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 25,
            ],
            [
                'nama' => 'Brian Cornelius Kusuma',
                'nim' => '062301017',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 26,
            ],
            [
                'nama' => 'Gabriel',
                'nim' => '062301012',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 27,
            ],
            [
                'nama' => 'Sofita Dea Angelica Santi',
                'nim' => '062302067',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 28,
            ],
            [
                'nama' => 'Stevano Wahyu Al\'fandi',
                'nim' => '062401023',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 29,
            ],
            [
                'nama' => 'Roland Jess Pratama',
                'nim' => '062401002',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 30,
            ],
            [
                'nama' => 'Aditya Dwi Saputra',
                'nim' => '062502051',
                'jabatan' => 'Staff',
                'departemen' => 'Komunikasi & Informasi',
                'urutan' => 31,
            ],
        ];

        foreach ($data as $item) {
            StrukturOrganisasi::create($item);
        }
    }
}
