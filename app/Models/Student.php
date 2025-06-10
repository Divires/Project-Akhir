<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Student extends Authenticatable
{
    protected $table = 'student';
    
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'class',
        'nis',
        'remember_token',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
