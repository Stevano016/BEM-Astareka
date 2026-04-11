<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['nama', 'nim', 'prodi', 'kategori', 'pesan', 'status', 'catatan_admin'])]
class Aspirasi extends Model
{
    protected $table = 'aspirasi';
}
