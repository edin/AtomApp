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
    public function __construct(Container $di)
    {
        $di->bind(IConnection::class)
            ->to(Connection::class);

        $di->bind(IDatabaseConnector::class)
            ->toFactory(function () {
                return new MySqlConnector(
                    "localhost",
                    "root",
                    "root",
                    "atom_framework"
                );
            });

        $di->bind(UrlService::class)
            ->toSelf()
            ->withName("url")
            ->asShared();

        $di->bind(PageViewModel::class)
            ->toSelf()
            ->withName("page")
            ->asShared();
    }
}
