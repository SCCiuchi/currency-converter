<?php

namespace Core\Interfaces;

use Core\Services\RateProviderService\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}