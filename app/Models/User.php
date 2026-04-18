<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_SEKRETARIS = 'sekretaris';
    const ROLE_MENDAGRI = 'mendagri';

    /**
     * Mass assignment protection (Pindahan dari #[Fillable])
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    public function isAdmin(): bool
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isSekretaris(): bool
    {
        return $this->role === self::ROLE_SEKRETARIS;
    }

    public function isMendagri(): bool
    {
        return $this->role === self::ROLE_MENDAGRI;
    }

    /**
     * Hidden attributes for serialization (Pindahan dari #[Hidden])
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * (Versi properti lebih aman untuk downgrade, meski method casts() sudah ada sejak L11)
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}