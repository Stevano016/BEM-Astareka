<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'deskripsi', 'departemen', 'icon', 'bg_style', 'is_featured', 'urutan', 'is_active'])]
class ProgramKerja extends Model
{
    protected $table = 'program_kerja';

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];
}
