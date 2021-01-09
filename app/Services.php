<?php

namespace App;

use App\Services\UrlService;
use App\ViewModels\PageViewModel;
use Atom\Container\Container;
use Atom\Database\Connection;
use Atom\Database\Interfaces\IConnection;
use Atom\Database\Connector\MySqlConnector;
use Atom\Database\Interfaces\IDatabaseConnector;

class Services
{
    public function __construct(Container $container)
    {
        $container->bind(IConnection::class)
            ->to(Connection::class);

        $container->bind(IDatabaseConnector::class)
            ->toFactory(function () {
                return new MySqlConnector(
                    "localhost",
                    "root",
                    "root",
                    "orm_test"
                );
            });

        $container->bind("url")
            ->to(UrlService::class)
            ->asShared();

        $container->bind(PageViewModel::class)
            ->toSelf()
            ->withName("page")
            ->asShared();
    }
}
