<?php
namespace App\Transformers\v1;

use App\Model\Api\v1\Endereco;

class EnderecoTransformer extends \League\Fractal\TransformerAbstract
{
    protected $availableIncludes = ['municipio'];

    public function transform(Endereco $endereco)
    {
        return [
            'id'=>$endereco->id_endereco,
            'bairro'=>$endereco->bairro,
            'id_municipio'=>$endereco->id_municipio,
        ];
    }
    public function includeMunicipio(Endereco $endereco)
    {
        return $endereco->municipio ? $this->item($endereco->municipio, new MunicipioTransformer) : null;
    }
}
