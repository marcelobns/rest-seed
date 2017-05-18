<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
    protected $connection = 'pgsql_sig';
    protected $table = 'pessoa';
    protected $primaryKey = 'id_pessoa';
}
