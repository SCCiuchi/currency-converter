<?php

namespace App\Services\ExchangeService;

use App\Services\RateService\RateCollection;

class Exchange
{
    public function executeExchange(RateCollection $rateCollection, string $selectedCurrency): array
    {
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