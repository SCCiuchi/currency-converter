<?php

namespace App\Converter;

use App\Interfaces\RateProviderInterface;
use SimpleXMLElement;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;

class RateEcb implements RateProviderInterface
{
    function printRate(\App\Interfaces\RateProviderInterface $provider)
    {
        var_dump($provider->getRate());
    }

    public function getRate(): CurrencyRates
    {
        $rateCollection = $this->getContent();
        $currencyRates = new CurrencyRates();

        foreach ($rateCollection as $key => $value) {
            $currencyRates->addCurrency($key, $value);
        }

        return $currencyRates;
    }

    private function getContent()
    {
        $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $currencies = [];

        try {
            $client = new Client();
            $response = $client->get($url);
        } catch (ServerException $e) {

        }

        $content = (string)$response->getBody()->getContents();

        if (isset($content)) {
            $response = new SimpleXMLElement($content);
            $xml = $response;
        }

        if (isset($xml)) {
            foreach ($xml->Cube->Cube->Cube as $currency) {
                $attributes = $currency->attributes();
                $currencies[(string)$attributes['currency']] = (float)$attributes['rate'];
            }
        }

        return $currencies;
    }
}