<?php

namespace App\DTO;

use App\Http\Requests\StoreSuporteRequest;

class CreateSuporteDTO{

    public function __construct(
        public string $assunto,
       public string $status,
       public string $conteudo,
       )
       {

       } 

       public static function makeFromRequest(StoreSuporteRequest $request): self{

        return new self(
            $request->assunto,
            'A', //$request->status,
            $request->conteudo
        );
       }
}