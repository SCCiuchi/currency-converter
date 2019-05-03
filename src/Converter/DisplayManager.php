<?php

namespace App\Converter;

class DisplayManager
{
    public function displayEcbResult()
    {
        $currency = $this->getUserSelectedCurrency();
        $result = '';

        if (isset($currency)) {
            $exchange = new ExchangeManager();
            $result = $exchange->executeCurrencyExchange($currency);
        }

        return $result;
    }

    public function displayBnrResult()
    {
        $currency = $this->getUserSelectedCurrency();
        $result = '';

        if (isset($currency)) {
            $exchange = new ExchangeManager();
            $result = $exchange->executeCurrencyExchange($currency);
        }

        return $result;
    }

    private function getUserSelectedCurrency()
    {
        if(isset($_POST['currency'])) {
            $currency = $_POST['currency'];
        }

        return $currency;
    }
}