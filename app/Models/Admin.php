<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'picture',
        'email',
        'password',
        'role',
        'phone',
        'permissions',
    ];

    protected $hidden = [
        'password',
    ];
}
