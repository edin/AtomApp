<?php

namespace App\ViewModels;

final class SortOrder
{
    public string $fieldName = "";
    public string $direction = "asc";
}

final class Field
{
    public string $fieldName;
    public string $title;
    public bool   $sortable = false;
    public bool   $filterable = false;
}

final class FieldCollection
{
    private array $fields = [];

    public function add(Field $field): void
    {
        $this->fields[] = $field;
    }
}

final class SortCollection
{
    private array $order = [];

    public function add(SortOrder $order)
    {
        $this->order[$order->fieldName] = $order;
    }

    public function remove(SortOrder $order)
    {
        unset($this->order[$order->fieldName]);
    }

    public function removeBy(string $fieldName)
    {
        unset($this->order[$fieldName]);
    }

    public function fromString(string $order)
    {
        $parts = explode(",", $order);
        foreach ($parts as $part) {
            $subParts = explode(".", $part);
            $fieldName = $subParts[0] ?? "";
            $fieldOrder = $subParts[1] ?? "asc";
            if ($fieldOrder !== "desc") {
                $fieldOrder = "asc";
            }
            $orderBy = new SortOrder();
            $orderBy->fieldName = $fieldName;
            $orderBy->direction = $fieldOrder;
            $this->add($orderBy);
        }
    }

    public function items(): array
    {
        return $this->order;
    }

    public function getSortDirection(string $fieldName): string
    {
        if (isset($this->order[$fieldName])) {
            return $this->order[$fieldName]->direction;
        }
        return "";
    }
}

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
