<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'fullname',
        'email',
        'password',
        'phone',
        'profile_picture',
        'cv',
        'is_online',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }
}
