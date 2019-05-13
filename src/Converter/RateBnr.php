<?php

namespace App\Converter;

use App\Interfaces\RateProviderInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use SimpleXMLElement;

class RateBnr implements RateProviderInterface
{
    public function getRate(): CurrencyRates
    {
        return new CurrencyRates();
    }

    private function getContent()
    {
        $url = 'https://www.bnr.ro/nbrfxrates.xml';
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
            foreach ($xml->Body->Cube->Rate as $currency) {
                $attributes = $currency->attributes();
                $currencies[(string)$attributes['currency']] = (float)$currency;
            }

            return $currencies;
        }
    }
}