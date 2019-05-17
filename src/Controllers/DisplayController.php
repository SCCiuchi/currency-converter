<?php

namespace App\Controllers;

use App\Core\Interfaces\RateCollectionInterface;
use App\Core\Services\ExchangeService\ExchangeRates;

class DisplayController
{
    /** @var RateCollectionInterface */
    protected $rateProvider;

    public function __construct(RateCollectionInterface $rateProvider)
    {
        $this->rateProvider = $rateProvider;
    }

    public function displayRate(): void
    {
        $selectedCurrency = $this->getUserSelectedCurrency();

        if (isset($selectedCurrency)) {
            $exchangeService = new ExchangeRates(
                $this->rateProvider->getRate(),
                $selectedCurrency
            );

            $output = $exchangeService->executeExchange();

            foreach ($output as $item) {
                echo $item;
            }
        }
    }

    private function getUserSelectedCurrency(): string
    {
        $currencyPattern = "/[A-Z][A-Z][A-Z]/";

        if(
            isset($_POST['currency'])
            && ctype_alpha($_POST['currency'])
            && preg_match($currencyPattern, $_POST['currency'])
        ) {
            $selectedCurrency = $_POST['currency'];
        }

        return $selectedCurrency;
    }
}