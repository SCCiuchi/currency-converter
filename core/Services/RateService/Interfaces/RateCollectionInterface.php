<?php

namespace Core\Services\RateService\Interfaces;

use Core\Services\RateService\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}