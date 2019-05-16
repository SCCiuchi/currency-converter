<?php

namespace App\Core\Provider;

use App\Core\Interfaces\ReaderInterface;

abstract class Reader implements ReaderInterface
{
    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function getContent(): string
    {
        return $this->parseXML($this->readXML());
    }

    public function readXML()
    {
        return file_get_contents($this->url);
    }


    abstract protected function parseXML($content): string;

    abstract public function convertXMLToArray(array $content): Rate;
}