# SUG - Savonlinna UnderGround Website

## Infrastructure ##

- PHP 7 from Remi repository
- Apache 2
- MongoDB 3.2 as Docker container

## Application ##

- zend-expressive
- zend-servicemanager
- zend-router
- twig
- whoops
- league/flysystem
- sokil/php-mongo

## Commands ##

Install all Ansible roles

`ansible-galaxy install -r ansible/requirements.yml -p ansible/roles --force`

Build Vagrant machine

`vagrant up`

Provision again Vagrant machine

`vagrant provision`

## Development

URL : http://dev.sug.music
