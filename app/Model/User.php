<?php

namespace App\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'id_usuario_sig', 'id_usuario_sig',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
