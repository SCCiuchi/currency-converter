<?php

namespace App\Converter;

class DisplayController
{
    // TODO should receive selected currency as param
    public function displayEcbResult()
    {
        $currency = $this->getUserSelectedCurrency();
        $result = '';

        if (isset($currency)) {
            $exchange = new ExchangeRates();
            $result = $exchange->executeCurrencyExchange($currency);
        }

        return $result;
    }

    // TODO should receive selected currency as param
    public function displayBnrResult()
    {
        $currency = $this->getUserSelectedCurrency();
        $result = '';

        if (isset($currency)) {
            $exchange = new ExchangeRates();
            $result = $exchange->executeCurrencyExchange($currency);
        }

        return $result;
    }

    // TODO 1. get rid of this later - should not be in this class
    // TODO 2. add validation - string length max 3 && contains only letters
    private function getUserSelectedCurrency()
    {
        if(isset($_POST['currency'])) {
            $currency = $_POST['currency'];
        }

        return $currency;
    }
}