<?php

$id = $_POST['currency'];

function getApiResponse()
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

function getUserSelectedCurrency($id)
{
    $currencies = getApiResponse();
    $selectedCurrency = $currencies[$id];

    return executeCurrencyExchange($selectedCurrency, $currencies);
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

if (!empty($id)) {
    $values = getUserSelectedCurrency($id);
}