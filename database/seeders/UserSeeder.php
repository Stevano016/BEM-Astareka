<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin ASTAREKA',
            'email' => 'admin@astareka-ush.ac.id',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
        ]);
    }
}
