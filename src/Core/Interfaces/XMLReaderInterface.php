<?php

namespace App\Core\Interfaces;

interface XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement;
}