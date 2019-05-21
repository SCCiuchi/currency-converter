<?php

namespace Config\RateReader\Interfaces;

interface XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement;
}