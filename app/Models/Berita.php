<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
// Hapus import Attributes\Fillable karena sudah tidak dipakai

class Berita extends Model
{
    protected $table = 'berita';

    // Pindahkan daftar field ke sini (Cara Tradisional)
    protected $fillable = [
        'judul', 
        'slug', 
        'konten', 
        'excerpt', 
        'gambar', 
        'kategori', 
        'is_published', 
        'published_at', 
        'user_id'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Auto-generate slug tetap aman digunakan di Laravel 12
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->judul) . '-' . substr(uniqid(), -4);
            }
        });
    }

    // Scope juga tetap aman
    public function scopePublished($q)
    {
        return $q->where('is_published', true)->whereNotNull('published_at');
    }
}