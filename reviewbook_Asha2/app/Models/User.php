<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    protected $hidden = [
        'password','remember_token',
    ];


    public function profile()
{
    return $this->hasOne(Profile::class);
}

public function comments()
{
    return $this->hasMany(Comment::class);
}



}
