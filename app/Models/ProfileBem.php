<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Hapus import Attributes\Fillable

class ProfileBem extends Model
{
    protected $table = 'profile_bem';

    // Pindahkan ke properti protected
    protected $fillable = ['key', 'value'];

    // Helper static method ini tetap aman dan sangat bagus kodenya
    public static function getValue(string $key, string $default = ''): string
    {
        return static::where('key', $key)->value('value') ?? $default;
    }
}