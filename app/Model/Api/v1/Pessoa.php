<?php

namespace App\Model\Api\v1;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'pgsql_sigaa';
    protected $table = 'comum.pessoa';
    protected $primaryKey = 'id_pessoa';

    public function discente(){
        return $this->belongsTo(Discente::class, 'id_pessoa')
            ->whereIn('status', [1,5,6,8,9])
            ->orderBy('status', 'asc');
    }
    public function discentes(){
        return $this->hasMany(Discente::class, 'id_pessoa');
    }
}
