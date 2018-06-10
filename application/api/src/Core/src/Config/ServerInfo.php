<?php

namespace Core\Config;

/**
 * Public information of server or site configuration
 * @package Core\Config
 */
class ServerInfo
{
    const CONFIG_TOKEN = 'server_info';
    const NAME = 'name';
    const SITE_NAME = 'site_name';
    const SITE_URL = 'site_url';
    const SITE_DEFAULT_PORT = 'site_default_port';

    private $config = [];

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function info(string $configuration){
        return $this->config[self::CONFIG_TOKEN][$configuration];
    }

    public function get(){
        return $this->config;
    }
}