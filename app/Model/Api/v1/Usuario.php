<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {
    protected $connection = 'pgsql_sig';
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';

}
