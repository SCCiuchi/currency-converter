<?php

namespace App\Services\RateService\Interfaces;

use App\Services\RateService\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}