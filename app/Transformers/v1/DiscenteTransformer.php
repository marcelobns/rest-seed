<?php
namespace App\Transformers\v1;

use App\Model\Api\v1\Discente;

class DiscenteTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['curso'];

    public function transform(Discente $discente)
    {
        return [
            'id'=>$discente->id_discente,
            'matricula'=>$discente->matricula,
            'status'=>$discente->status,
            'id_curso'=>$discente->id_curso,
        ];
    }
    public function includeCurso(Discente $discente)
    {
        return $discente->curso ? $this->item($discente->curso, new CursoTransformer) : null;
    }
}
