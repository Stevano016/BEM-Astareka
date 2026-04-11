<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['tagline', 'judul', 'judul_aksen', 'deskripsi', 'gambar', 'cta_text_1', 'cta_text_2', 'is_active'])]
class Hero extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
