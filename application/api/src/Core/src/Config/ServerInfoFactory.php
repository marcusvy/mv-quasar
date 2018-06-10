<?php
namespace Core\Config;

use Psr\Container\ContainerInterface;

class ServerInfoFactory
{
    public function __invoke(ContainerInterface $container) : ServerInfo
    {
        $config = $container->get('config');
        return new ServerInfo($config);
    }
}
