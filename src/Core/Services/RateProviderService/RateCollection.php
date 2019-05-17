<?php

namespace App\Core\Services\RateProviderService;

class RateCollection
{
    protected $data = [];

    public function addCurrency(string $currency, float $rate): void
    {
        $this->data[$currency] = $rate;
    }

    public function getRates(): array
    {
        return $this->data;
    }
}