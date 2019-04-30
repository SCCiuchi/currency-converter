<?php

namespace App\Converter;

use SimpleXMLElement;

class RateManager
{
    private function getApiResponse():array
    {
        $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $response = file_get_contents($url);
        $xml = new SimpleXMLElement($response);

        $currencies = [];

        foreach ($xml->Cube->Cube->Cube as $currency) {
            $attributes = $currency->attributes();
            $currencies[(string)$attributes['currency']] = (string)$attributes['rate'];
        }

        return $currencies;
    }
}