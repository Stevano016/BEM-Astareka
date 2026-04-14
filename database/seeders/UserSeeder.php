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
            'name' => 'ASTAREKA',
            'email' => 'adminbem@astareka-ush.ac.id',
            'password' => Hash::make('Anakbemastareka311202#'),
            'role' => 'superadmin',
        ]);
    }
}
