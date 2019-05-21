<?php

namespace Config\ConfigReader;

use Config\ConfigReader\Loader;

class ConfigLoader
{
    private const CONFIG_FILE = 'config.yml';
    private const CONFIG_PATH = __DIR__.'/../../';
    private static $cachedConfig = [];

    public function debug()
    {
        $config = $this->loadConfig();
        var_dump($config);
    }
    
    private function loadConfig()
    {
        $loader = new Loader();
        $loader->load(self::CONFIG_PATH . self::CONFIG_FILE);

        return static::$cachedConfig = $loader->export();
    }
}