<?php

namespace App\Converter;

class ExchangeManager
{
    private function executeCurrencyExchange($selectedCurrency, $currencies)
    {
        $data = '';

        if (!empty($selectedCurrency)) {
            foreach ($currencies as $currency => $rate) {
                $exchange = $rate / $selectedCurrency;
                $result = number_format($exchange, 4, ',', '');

                $data .= $currency . ' rate is ' . $result . '<br>';
            }
        }

        return $data;
    }
}