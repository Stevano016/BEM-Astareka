<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['judul', 'slug', 'konten', 'excerpt', 'gambar', 'kategori', 'is_published', 'published_at', 'user_id'])]
class Berita extends Model
{
    protected $table = 'berita';

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Auto-generate slug
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->slug) {
                $model->slug = Str::slug($model->judul) . '-' . substr(uniqid(), -4);
            }
        });
    }

    // Scope
    public function scopePublished($q)
    {
        return $q->where('is_published', true)->whereNotNull('published_at');
    }
}
