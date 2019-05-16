<?php

namespace App\Interfaces;

use App\Converter\CurrencyRates;

interface ProviderInterface
{
    public function getRate(): CurrencyRates;
}