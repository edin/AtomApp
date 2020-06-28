<?php

namespace App\ViewModels;

final class TableViewModel
{
    private int $page = 1;

    public function addColumn($column): void
    {
        $this->columns[] = $column;
    }

    public function setPage(int $page)
    {
        $this->page = $page;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setOrder(?string $fields)
    {
    }

    public function getOrder()
    {
        return "";
    }

    public function items(): array
    {
        return [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    }
}