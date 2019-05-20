<?php

namespace Core\Services\Interfaces;

use Core\Services\RateService\RateCollection;

interface RateCollectionInterface
{
    public function getRate(): RateCollection;
}