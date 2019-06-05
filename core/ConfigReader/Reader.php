<?php

namespace Core\ConfigReader;

use Core\ConfigReader\Interfaces\ReaderInterface;

abstract class Reader implements ReaderInterface
{
    protected $config = [];
    protected $source = '';

    public function getSource(): array
    {
        return $this->config;
    }

    public function setSource(string $source)
    {
        $this->source = $source;

        return $this;
    }

    public function export(): array
    {
       return $this->config;
    }

    public function keys(): array
    {
        return array_keys($this->config);
    }

    abstract public function load($path);
}