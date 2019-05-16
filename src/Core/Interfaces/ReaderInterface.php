<?php

namespace App\Core\Interfaces;

interface ReaderInterface
{
    public function getContent(): string;

    public function readXML();
}