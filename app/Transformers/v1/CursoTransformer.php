<?php
namespace App\Transformers\v1;

use App\Model\Api\v1\Curso;

class CursoTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Curso $curso)
    {
        return [
            'id'=>$curso->id_curso,
        ];
    }
}
