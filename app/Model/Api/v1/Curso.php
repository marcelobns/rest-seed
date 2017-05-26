<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $connection = 'pgsql_sigaa';
    protected $table = 'curso';
    protected $primaryKey = 'id_curso';
}
