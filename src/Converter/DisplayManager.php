<?php

namespace App\Converter;

class DisplayManager
{
    private function getUserSelectedCurrency($currency)
    {
        $currency = $_POST['currency'];

        $currencies = $this->getApiResponse();
        $selectedCurrency = $currencies[$currency];
    }



    public function displayResult()
    {
        $values = [];

        if (!empty($currency))
        {
            $values = $this->getUserSelectedCurrency($currency);
        }
    }
}