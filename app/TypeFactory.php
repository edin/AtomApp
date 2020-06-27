<?php

namespace App;

use Atom\Container\TypeInfo;
use Atom\Dispatcher\RequestTypeFactory;
use Atom\Container\TypeFactory\TypeFactoryRegistry;

class TypeFactory
{
    public function __construct(TypeFactoryRegistry $registry)
    {
        $registry->register(RequestTypeFactory::class, function (TypeInfo $type) {
            return $type->inNamespace("App\Messages");
        });

        $registry->register(RequestTypeFactory::class, function (TypeInfo $type) {
            return $type->inNamespace("App\Domain\Models");
        });
    }
}
