<?php

namespace App\Core\Services\ExchangeService;

use App\Core\Services\RateProviderService\RateCollection;

class ExchangeRates
{
    /** @var RateCollection */
    protected $rateCollection;

    protected $selectedCurrency;

    public function __construct(RateCollection $rateCollection, string $selectedCurrency)
    {
        $this->rateCollection = $rateCollection;
        $this->selectedCurrency = $selectedCurrency;
    }

    public function executeExchange(): array
    {
        $rateCollection = $this->rateCollection;
        $selectedCurrency = $this->selectedCurrency;
        $currency = '';
        $result = '';

        if (!empty($rateCollection)) {

            foreach ($rateCollection as $currency => $rate) {

                $operation = $rate / $selectedCurrency;
                var_dump($operation);

                $result = number_format($operation, 4, ',', '');
                var_dump($result);
            }


        }

        return array($currency, $result);
    }
}