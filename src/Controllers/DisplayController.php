<?php

namespace App\Controllers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Core\Services\RateService\Interfaces\RateCollectionInterface;
use Core\Services\ExchangeService\Exchange;

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