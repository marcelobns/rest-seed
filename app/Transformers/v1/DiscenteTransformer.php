<?php
namespace App\Transformers\v1;

use League\Fractal\Serializer\ArraySerializer;
use App\Model\Api\v1\Discente;

class DiscenteTransformer extends \App\Transformers\Transformer
{
    protected $availableIncludes = ['curso', 'forma_ingresso'];

    public function transform(Discente $discente)
    {
        $this->setSerializer(new ArraySerializer());
        return [
            'id'=>$discente->id_discente,
            'matricula'=>$discente->matricula,
            'ano_ingresso'=>$discente->ano_ingresso,
            'periodo_ingresso'=>$discente->periodo_ingresso,
            'status'=>$discente->status,
            'id_curso'=>$discente->id_curso,
            'id_forma_ingresso'=>$discente->id_forma_ingresso,
            'links'=>[
                'self' => url("api/v1/discentes/{$discente->id_discente}")
            ],
        ];
    }
    public function includeCurso(Discente $discente)
    {
        return $discente->curso ? $this->item($discente->curso, new CursoTransformer) : null;
    }
    public function includeFormaIngresso(Discente $discente)
    {
        return $discente->forma_ingresso ? $this->item($discente->forma_ingresso, new FormaIngressoTransformer) : null;
    }
}
