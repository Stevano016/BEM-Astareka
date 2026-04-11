<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'jabatan', 'departemen', 'foto', 'quote', 'urutan', 'is_active'])]
class StrukturOrganisasi extends Model
{
    protected $table = 'struktur_organisasi';

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
