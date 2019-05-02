<?php

namespace App\Interfaces;

interface Rate
{
    public function validateUrl();

    public function getContent();

    public function formatContent():array;
}