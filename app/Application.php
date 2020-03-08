<?php

namespace App;

use App\Configuration;
use Atom\Dispatcher\DispatcherServices;
use Atom\View\ViewServices;

class Application extends \Atom\Application
{
    public function configure()
    {
        $this->use(Configuration::class);
        $this->use(DispatcherServices::class);
        $this->use(ViewServices::class);
        $this->use(Routes::class);
        $this->use(TypeFactory::class);
    }
}
