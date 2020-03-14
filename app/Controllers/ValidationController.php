<?php

namespace App\Controllers;

use Atom\Validation\Validation;

class Customer
{
    public $firstName;
    public $lastName;
    public $email;
    public $address;
    public $phones;
}

class Address
{
    public $city;
    public $street;
}

final class ValidationController
{
    private $customer;
    private $validator;

    final public function index()
    {
        $this->customer = new Customer;
        $this->customer->firstName = "  Edin  ";
        $this->customer->lastName = " Omeragic ";
        $this->customer->email = "  edin.omeragic@gmail.com ";
        $this->customer->phones = ["", "Phone", ""];

        $this->customer->address = new Address;
        $this->customer->address->city = "";
        $this->customer->address->street = " Street Address ";

        $this->validator = Validation::create(function (Validation $rule) {
            $rule->firstName->required()->trim()->length(20, 30);
            $rule->lastName->required()->trim()->length(20, 30);
            $rule->email->required()->trim()->email();

            $rule->address->asObject(function (Validation $rule) {
                $rule->city->trim()->required();
                $rule->street->trim()->required();
            });

            $rule->phones->asArray()->required();
        });


        return [
            'model' => $this->customer,
            'validation' => $this->validator->validate($this->customer)
        ];
    }
}
