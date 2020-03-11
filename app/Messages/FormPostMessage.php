<?php

namespace App\Messages;

class FormPostMessage implements IValidatable
{
    public $firstName;
    public $lastName;


    public function validate(): array
    {
        $errors = [];

        if (empty($this->firstName)) {
            $errors["firstName"] = "FirstName is required";
        }

        if (empty($this->firstName)) {
            $errors["lastName"] = "LastName is required";
        }

        return $errors;
    }
}
