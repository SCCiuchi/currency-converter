<?php

namespace Core\Services\Interfaces;

interface XMLReaderInterface
{
    public function getContent(string $url): \SimpleXMLElement;
}