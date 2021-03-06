<?php

namespace App\Model\Login;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $connection = 'pgsql_sigcomum';
    protected $table = 'comum.usuario';
    protected $primaryKey = 'id_usuario';

    protected $hidden = [
        'senha', 'senha_mobile',
    ];
    public function pessoa(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }
}
