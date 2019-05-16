<?php

namespace App\Core\Interfaces;

use App\Core\Provider\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}