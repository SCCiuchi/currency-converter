<?php

namespace App\Converter;

class ConversionController
{
    public function executeCurrencyExchange(string $selectedCurrency)
    {
        $rate = new EcbRateProvider();
        $currencies = $rate->formatContent();
        $exchange = '';

        if (isset($currencies) && isset($selectedCurrency)) {
            $selectedCurrency = $currencies[$selectedCurrency];

            foreach ($currencies as $currency => $value) {
                $operation = $value / $selectedCurrency;
                $result = number_format($operation, 4, ',', '');

                $exchange .= $currency.'  -  '.$result.'<br>';
            }
        }

        return $exchange;
    }
}