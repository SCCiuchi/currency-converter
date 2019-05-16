<?php

namespace App\Interfaces;

use App\Core\Provider\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}