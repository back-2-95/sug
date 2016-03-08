<?php

namespace App\Factory;

use League\Flysystem\Exception;
use MongoDB\Client;

class Mongodb
{
    public function __invoke($services)
    {
        $config  = $services->get('config');
        $config  = $config['mongodb'];
        $uri = $config['uri'];

        return new Client($uri);
    }
}
