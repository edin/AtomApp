<?php

namespace App\Messages;

interface IValidatable
{
    public function validate(): array;
}
