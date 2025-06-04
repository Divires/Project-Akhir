<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'name', 'email', 'password', 'role', 'nis', 'class', 'position', 'photo',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Mutator supaya password otomatis di-hash saat diset
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
