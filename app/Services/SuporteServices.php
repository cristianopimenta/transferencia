<?php

namespace App\Services;

use App\DTO\CreateSuporteDTO;
use App\DTO\UpdateSuporteDTO;
use App\Repositories\SuporteRepositoryInterface;
use stdClass;

class SuporteServices
{
    public function __construct(
        protected SuporteRepositoryInterface $repository
    ) {
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ) {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }


    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateSuporteDTO $dto): void
    {
        $this->repository->new($dto);
    }

    public function update(UpdateSuporteDTO $dto): void
    {
        $this->repository->update($dto);
    }

    public function delete(string $id): void
    {

        $this->repository->delete($id);
    }
}
