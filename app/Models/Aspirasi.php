<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\LogsActivity;

class Aspirasi extends Model
{
    use LogsActivity;
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