<?php

function getCurrencyValues()
{
    $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
    $response = file_get_contents($url);
    $xml = new SimpleXMLElement($response);

    $currencies = [];

    foreach ($xml->Cube->Cube->Cube as $currency) {
        $attributes = $currency->attributes();
        $currencies[(string) $attributes['currency']] = (string) $attributes['rate'];
    }

    return $currencies;
}

function getSelectedCurrency()
{
    $currencies = getCurrencyValues();
    $filteredCurrencies = [];

    if (empty($_GET['currency'])) {
        $filteredCurrencies = $currencies;
    }

    var_dump($filteredCurrencies);
    return $filteredCurrencies;
}


function executeCurrencyExchange($selectedCurrency, $currencies)
{
    $data = '';

    if (!empty($selectedCurrency)) {
        foreach ($currencies as $currency => $rate) {
            $exchange =  $rate / $selectedCurrency;
            $result = number_format($exchange, 4, ',', '');

            $data .= $currency . ' rate is ' . $result . '<br>';
        }
    }

    return $data;
}

function displayExchangeRate()
{
    $filteredCurrencies = getSelectedCurrency();


    return $filteredCurrencies;
}
