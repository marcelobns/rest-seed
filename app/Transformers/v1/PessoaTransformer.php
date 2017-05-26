<?php
namespace App\Transformers\v1;

use League\Fractal\Serializer\ArraySerializer;
use App\Model\Api\v1\Pessoa;

class PessoaTransformer extends \App\Transformers\Transformer
{
    protected $availableIncludes = ['discentes', 'endereco'];

    public function transform(Pessoa $pessoa)
    {
        $this->setSerializer(new ArraySerializer());
        return [
            'id'=>$pessoa->id_pessoa,
            'nome'=>$pessoa->nome,
            'sexo'=>$pessoa->sexo,
            'cpf'=>$pessoa->cpf_cnpj,
            'identidade'=>$pessoa->numero_identidade,
            'identidade_expedidor'=>$pessoa->orgao_expedicao_identidade,
            'email'=>$pessoa->email,
            'internacional'=>$pessoa->internacional,
            'passaporte'=>$pessoa->passaporte,
            'links'=>[
                'self' => url("api/v1/pessoas/{$pessoa->id_pessoa}")
            ],
        ];
    }
    public function includeDiscentes(Pessoa $pessoa)
    {
        return $pessoa->discentes ? $this->collection($pessoa->discentes, new DiscenteTransformer) : null;
    }
    public function includeEndereco(Pessoa $pessoa)
    {
        return $pessoa->endereco ? $this->collection($pessoa->endereco, new EnderecoTransformer) : null;
    }
}
