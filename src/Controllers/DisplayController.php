<?php

namespace App\Converter;

class DisplayController
{
    /** @var Ecb|Bnr */
    protected $rateProvider;

    public function __construct($rateProvider)
    {
        $this->rateProvider = $rateProvider;
        $this->displayRate($rateProvider);
    }

    public function displayRate($rateProvider)
    {
        $selectedCurrency = $this->getUserSelectedCurrency();

        if (isset($selectedCurrency)) {
            $rateProvider->getRate();
        }
    }

    private function getUserSelectedCurrency()
    {
        $currencyPattern = "/([A-Z][A-Z][A-Z])/g";
        $selectedCurrency = '';

        if(
            isset($_POST['currency'])
            && ctype_alpha($selectedCurrency)
            && preg_match($selectedCurrency, $currencyPattern)
        ) {
            $selectedCurrency = $_POST['currency'];
        }

        return $selectedCurrency;
    }
}