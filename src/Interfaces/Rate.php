<?php

namespace App\Interfaces;

interface Rate
{
    public function getContent(string $url);

    public function formatContent():array;
}