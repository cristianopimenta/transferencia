<?php

namespace App\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

class PaginatorPresenter implements PaginationInterface
{
/**
 * @var stdClass[]
 */
    private array $items;

    public function __construct(
        protected LengthAwarePaginator $paginator,
    ) {
        $this->items = $this->paginator->items()
    }

    /**
     *  @return stdClass[]
     */


    public function items(): array
    {
        return $this->paginator->it
    }
    public function total(): int
    {
        return $this->paginator->total() ?? 0;
    }
    public function isFirstPage(): bool
    {
        return $this->paginator->onFirstPage();
    }
    public function isLastPage(): bool
    {
        return $this->paginator->currentPage() === $this->paginator->lastPage();
    }
    public function currentPage(): int
    {
        return $this->paginator->currentPage() ?? 1;
    }
    public function getNumberNextPage(): int
    {
        return $this->paginator->currentPage() + 1;
    }
    public function getNumberPreviousPage(): int
    {
        return $this->paginator->currentPage() - 1; 
    }
}
