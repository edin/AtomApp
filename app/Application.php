<?php

namespace App;

use Atom\View\ViewServices;
use Atom\Dispatcher\DispatcherServices;

class Application extends \Atom\Application
{
    public function configure()
    {
        $this->use(DispatcherServices::class);
        $this->use(ViewServices::class);
        $this->use(Routes::class);
        $this->use(TypeFactory::class);
    }
}
