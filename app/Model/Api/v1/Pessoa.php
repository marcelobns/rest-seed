<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'pgsql_sigcomum';
    protected $table = 'comum.pessoa';
    protected $primaryKey = 'id_pessoa';

    public function discentes(){
        return $this->hasMany(Discente::class, 'id_pessoa');
    }
}
