<?php

namespace App\DTO;

use App\Http\Requests\StoreSuporteRequest;

class UpdateSuporteDTO
{

    public function __construct(
        public string $id,
        public string $assunto,
        public string $status,
        public string $conteudo,
    ) {
    }

    public static function makeFromRequest(StoreSuporteRequest $request): self
    {

        return new self(
            $request->id,
            $request->assunto,
            'A', //$request->status,
            $request->conteudo
        );
    }
}
