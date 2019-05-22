<?php

namespace Core\ConfigReader;

class ConfigLoader
{
    private const CONFIG_FILE = 'config.yml';
    private const CONFIG_PATH = __DIR__ . '/../../config/';
    private $cachedConfig = [];

    public function __construct()
    {
        $this->loadConfig();
    }

    public function getConfigKeys(string $configKey)
    {
        if (empty($cachedConfig)) {
            $cachedConfig = $this->cachedConfig;
        }

        return $cachedConfig[$configKey];
    }

    private function loadConfig(): self
    {
        $loader = new Loader();
        $loader->load(self::CONFIG_PATH . self::CONFIG_FILE);
        $this->cachedConfig = $loader->export();

        return $this;
    }
}