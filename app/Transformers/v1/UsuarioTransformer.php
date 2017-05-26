<?php
namespace App\Transformers\v1;

use League\Fractal\Serializer\ArraySerializer;
use App\Model\Api\v1\Usuario;

class UsuarioTransformer extends \App\Transformers\Transformer
{
    protected $availableIncludes = ['pessoa', 'discente'];

    public function transform(Usuario $usuario)
    {
        $this->setSerializer(new ArraySerializer());
        return [
            'id'=>$usuario->id_usuario,
            'tipo'=>$usuario->tipo,
            'login'=>$usuario->login,
            'email'=>$usuario->email,
            'id_unidade'=>$usuario->id_unidade,
            'id_setor'=>$usuario->id_setor,
            'ramal'=>$usuario->ramal,
            'autorizado'=> $usuario->autorizado,
            'inativo'=> $usuario->inativo,
            'id_pessoa'=>$usuario->id_pessoa,
            'id_servidor'=>$usuario->id_servidor,
            'id_restaurante'=>$usuario->id_restaurante,
            'data_cadastro'=>$usuario->data_cadastro,
            'ultima_troca_senha'=>$usuario->ultima_troca_senha,
            'links'=>[
                'self' => url("api/v1/usuarios/$usuario->id_usuario")
            ],
        ];
    }
    public function includePessoa(Usuario $usuario)
    {
        return $usuario->pessoa ? $this->item($usuario->pessoa, new PessoaTransformer) : null;
    }
    public function includeDiscente(Usuario $usuario)
    {
        return $usuario->discente ? $this->item($usuario->discente, new DiscenteTransformer) : null;
    }
}
