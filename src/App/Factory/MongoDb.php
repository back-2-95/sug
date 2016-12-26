<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use MongoDB\Client;

class Mongodb
{
    public function __invoke(ContainerInterface $services)
    {
        $config  = $services->get('config');
        $config  = $config['mongodb'];
        $uri = $config['uri'];

        return new Client($uri);
    }
}
