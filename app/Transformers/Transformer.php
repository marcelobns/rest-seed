<?php
namespace App\Transformers;

class Transformer extends \League\Fractal\TransformerAbstract
{
    public function setSerializer($value)
    {
        return $this->currentScope->getManager()->setSerializer($value);
    }
}
