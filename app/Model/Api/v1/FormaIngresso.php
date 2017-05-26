<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class FormaIngresso extends Model
{
    protected $connection = 'pgsql_sigaa';
    protected $table = 'ensino.forma_ingresso';
    protected $primaryKey = 'id_pessoa';

}
