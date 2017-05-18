<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Discente extends Model {
    protected $connection = 'pgsql_sig';
    protected $table = 'discente';
    protected $primaryKey = 'id_discente';
}
