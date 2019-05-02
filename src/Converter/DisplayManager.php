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

        echo $result;
    }

    public function displayBnrResult()
    {
        $currency = $this->getUserSelectedCurrency();

        if (isset($currency)) {
            echo $currency;
        }
    }

    private function getUserSelectedCurrency()
    {
        $currency = $_POST['currency'];
        $error = false;

        if (empty($currency)) {
            $error = true;
        }
        if ($error) {
            echo "Something went wrong or you haven't selected a currency";
        }

        return $currency;
    }
}