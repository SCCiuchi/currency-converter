<?php

namespace Core\RateReader;

use Core\RateReader\Interfaces\XMLReaderInterface;

class XMLReader implements XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement
    {
        $content = file_get_contents($url);
        return new \SimpleXMLElement($content);
    }
}
