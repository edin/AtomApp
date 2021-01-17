<?php

namespace App\Components;

final class Field
{
    public string $fieldName;
    public string $title;
    public bool   $sortable = false;
    public bool   $filterable = false;
}
