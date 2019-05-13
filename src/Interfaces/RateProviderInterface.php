<?php

namespace App\Interfaces;

use App\Converter\CurrencyRates;

interface RateProviderInterface
{
    public function getRate(): CurrencyRates;
}