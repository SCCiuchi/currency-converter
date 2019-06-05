<?php

namespace Core\RateReader\Interfaces;

interface XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement;
}