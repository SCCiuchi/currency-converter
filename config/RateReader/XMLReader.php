<?php

namespace Config\RateReader;

use Config\RateReader\Interfaces\XMLReaderInterface;

class XMLReader implements XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement
    {
        $content = file_get_contents($url);
        $xml = new \SimpleXMLElement($content);

        return $xml;
    }
}
