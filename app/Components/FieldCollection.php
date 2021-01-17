<?php

namespace App\Componenets;

final class FieldCollection
{
    private array $fields = [];

    public function add(Field $field): void
    {
        $this->fields[] = $field;
    }
}
