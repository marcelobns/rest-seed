<?php

namespace App\Model\Login;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'pgsql_sigcomum';
    protected $table = 'comum.pessoa';
    protected $primaryKey = 'id_pessoa';
}
