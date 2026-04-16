<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Отношение к роли
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // Проверка, является ли пользователь модератором
    public function isModerator()
    {
        return $this->role && $this->role->slug === 'moderator';
    }

    // Проверка, является ли пользователь читателем
    public function isReader()
    {
        return $this->role && $this->role->slug === 'reader';
    }
}