<?php

namespace App;

use Atom\Container\Container;
use Atom\Database\Connection;
use Atom\Database\Interfaces\IConnection;
use Atom\Database\Connector\MySqlConnector;
use Atom\Database\Interfaces\IDatabaseConnector;

class Services
{
    public function configureServices(Container $container)
    {
        $container->bind(IConnection::class)->to(Connection::class);
        $container->bind(IDatabaseConnector::class)->toFactory(function () {
            return new MySqlConnector("localhost", "root", "root", "orm_test");
        });
    }
}
