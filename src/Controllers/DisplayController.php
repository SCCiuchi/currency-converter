<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use App\Services\RateService\Interfaces\RateCollectionInterface;
use App\Services\ExchangeService\Exchange;

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
            $exchangeService = new Exchange();

            $result = $exchangeService->executeExchange($this->rateProvider->getRate(), $selectedCurrency);

            var_dump($result);
        }
    }

    private function getUserSelectedCurrency(): string
    {
        $currencyPattern = "/([a-zA-Z]{3})/";

        if(preg_match($currencyPattern, $_POST['currency'])) {
            return $_POST['currency'];
        }
    }
}