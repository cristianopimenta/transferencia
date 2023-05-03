<?php

namespace App\Repositories;

use App\DTO\{
    CreateSuporteDTO,
    UpdateSuporteDTO
};
use App\Models\Suporte;
use App\Repositories\SuporteRepositoryInterface;


use stdClass;

class SuporteEloquenteORM implements SuporteRepositoryInterface
{
    public function __construct(
        protected Suporte $model
    ) {
    }

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null)
    {
        $result = $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('assunto', $filter);
                    $query->orWhere('conteudo', 'like', "%{$filter}%");
                }
            })
            ->paginate($totalPerPage, ["*"], 'page', $page);
           
            return new PaginatorPresenter($result); 
    }
    public function getAll(string $filter = null): array
    {
        return $this->model
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('assunto', $filter);
                    $query->orWhere('conteudo', 'like', "%{$filter}%");
                }
            })
            ->get()
            ->toArray();
    }
    public function findOne(string $id): stdClass|null
    {
        $suporte = $this->model->find($id);

        if (!$suporte) {
            return null;
        }

        return (object) $suporte->toArray();
    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
    public function new(CreateSuporteDTO $dto): stdClass
    {
        $suporte = $this->model->create((array) $dto);
        return (object) $suporte->toArray();
    }
    public function Update(UpdateSuporteDTO $dto): stdClass|null
    {
        if (!$suporte = $this->model->find($dto->id)) {
            return null;
        }

        $suporte->update(
            (array) $dto
        );

        return (object) $suporte->toArray();
    }
}
