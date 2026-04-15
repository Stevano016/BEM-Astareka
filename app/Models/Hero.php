<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Hapus import Attributes\Fillable

class Hero extends Model
{
    // Tambahkan properti fillable tradisional
    protected $fillable = [
        'tagline', 
        'judul', 
        'judul_aksen', 
        'deskripsi', 
        'gambar', 
        'cta_text_1', 
        'cta_text_2', 
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}