<?php

namespace Core\Services\ExchangeService;

use Core\Services\RateProviderService\RateCollection;

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

        if (!empty($rateCollection)) {
            $result = [];
            $findSelectedCurrency = $rateCollection->findSelectedCurrency($selectedCurrency);

            foreach ($rateCollection as $currency => $rate) {
                $operation = $rate['value'] / (float)$findSelectedCurrency['value'];
                $finalRate = number_format($operation, 3, '.', ',');

                $result[] = [
                    'value' => $finalRate,
                    'label' => $rate['label']
                ];
            }
        }

        return $result;
    }
}