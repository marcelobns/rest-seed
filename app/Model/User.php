<?php

namespace App\Model;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'email', 'username', 'password', 'id_pessoa_sig'
    ];
    protected $hidden = [
        'password', 'remember_token', 'id_usuario',
    ];
    CONST rules = [
        'login'=>[
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6'
        ],
        'store'=>[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users|unique:pgsql_sigcomum.usuario,login',
            'password' => 'sometimes|string|min:6',
        ],
    ];
    public function usuario_sig(){
        return $this->belongsTo(Api\v1\Usuario::class, 'id_usuario');
    }
}
