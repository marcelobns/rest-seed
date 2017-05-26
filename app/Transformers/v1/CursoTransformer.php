<?php
namespace App\Transformers\v1;

use League\Fractal\Serializer\ArraySerializer;
use App\Model\Api\v1\Curso;

class CursoTransformer extends \App\Transformers\Transformer
{
    public function transform(Curso $curso)
    {
        $this->setSerializer(new ArraySerializer());
        return [
            'id'=>$curso->id_curso,
            'nome'=>$curso->nome,
            'nivel'=>$curso->nivel,
            'codigo_inep'=>$curso->codigo_inep,
            'id_turno'=>$curso->id_turno,
            'links'=>[
                'self' => url("api/v1/cursos/{$curso->id_curso}")
            ],
        ];
    }
}
