<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalenderEvent extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'waktu_mulai',
        'waktu_selesai',
        'warna'
    ];
}
