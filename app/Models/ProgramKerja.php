<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Hapus baris import Attributes\Fillable

class ProgramKerja extends Model
{
    protected $table = 'program_kerja';

    // Pindahkan daftar field ke properti protected
    protected $fillable = [
        'nama', 
        'deskripsi', 
        'departemen', 
        'icon', 
        'bg_style', 
        'is_featured', 
        'urutan', 
        'is_active'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}