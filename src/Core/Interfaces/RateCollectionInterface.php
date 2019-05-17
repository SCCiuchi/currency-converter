<?php

namespace App\Core\Interfaces;

use App\Core\Services\RateProviderService\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}