<?php

namespace Core\ConfigReader;

use Symfony\Component\Yaml\Yaml;

class Loader extends Reader
{
    public function load($path): self
    {
        $this->setSource($path);

        if (!file_exists($path)) {
            $this->config = [];

            return $this;
        }

        $this->config = (array) Yaml::parse(file_get_contents($path));

        return $this;
    }
}