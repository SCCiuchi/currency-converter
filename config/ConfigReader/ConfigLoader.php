<?php

namespace Config\ConfigReader;

use Config\ConfigReader\Loader;

class ConfigLoader
{
    private const CONFIG_FILE = 'config.yml';
    private const CONFIG_PATH = __DIR__.'/../../';
    private $cachedConfig = [];

    public function __construct()
    {
    }

    public function getConfigKeys(string $name = '')
    {
        if (empty($cachedConfig)) {
            $cachedConfig = $this->loadConfig()->cachedConfig;
        }

        return $cachedConfig[$name];
    }

    private function loadConfig(): self
    {
        $loader = new Loader();
        $loader->load(self::CONFIG_PATH . self::CONFIG_FILE);
        $this->cachedConfig = $loader->export();

        return $this;
    }
}