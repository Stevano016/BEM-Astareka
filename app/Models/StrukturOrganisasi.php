<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Hapus baris ini karena tidak ada di Laravel 12:
// use Illuminate\Database\Eloquent\Attributes\Fillable;

class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    // Pindahkan daftar field ke sini (Cara Tradisional)
    protected $fillable = [
        'nama', 
        'nim',
        'jabatan', 
        'departemen', 
        'foto', 
        'quote', 
        'urutan', 
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}