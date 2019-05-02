<?php

namespace App\Converter;


class ExchangeManager
{
    public function executeCurrencyExchange(string $selectedCurrency):string
    {
        $rate = new EcbRate();
        $currencies = $rate->formatContent();
        $exchange = '';

//        var_dump($currencies);

        if (isset($currencies)) {
            foreach ($currencies as $currency => $value) {
                $exchange = $value / $selectedCurrency;
//                $result = number_format($exchange, 4, ',', '');

                var_dump($exchange);
            }
        }

        var_dump($exchange);
        return $exchange;
    }
}