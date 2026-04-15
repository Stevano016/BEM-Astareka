<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    protected $table = 'aspirasi';

    // Gunakan properti biasa, jangan pakai Attribute #[]
    protected $fillable = [
        'nama', 
        'nim', 
        'prodi', 
        'kategori', 
        'pesan', 
        'status', 
        'catatan_admin'
    ];
}