<?php

namespace App\Componenets;

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
