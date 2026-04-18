<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run(): void
    {
    // Admin - Akses Semua Fitur
    User::updateOrCreate(
        ['email' => 'admin.bem@astareka-ush.ac.id'],
        [
            'name' => 'Admin Utama',
            'password' => Hash::make('Adm!nBEM#2026$Utama'),
            'role' => User::ROLE_ADMIN,
        ]
    );

    // Sekretaris - Mengelola Berita, Proker, Kalender
    User::updateOrCreate(
        ['email' => 'sekretaris.bem@astareka-ush.ac.id'],
        [
            'name' => 'Sekretaris BEM',
            'password' => Hash::make('Sekr3t@ris#BEM2026!'),
            'role' => User::ROLE_SEKRETARIS,
        ]
    );

    // Menteri Dalam Negeri - Mengelola Aspirasi
    User::updateOrCreate(
        ['email' => 'mendagri.bem@astareka-ush.ac.id'],
        [
            'name' => 'Mendagri BEM',
            'password' => Hash::make('M3ndagri!BEM#2026$'),
            'role' => User::ROLE_MENDAGRI,
        ]
    );
    }
}
