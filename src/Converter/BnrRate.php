<?php

namespace App\Converter;

use App\Interfaces\Rate;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use SimpleXMLElement;

class BnrRate implements Rate
{
    private const URL = 'https://www.bnr.ro/nbrfxrates.xml';

    public function validateUrl()
    {
        try {
            $client = new Client();
            $response = $client->get(static::URL);
        } catch (ServerException $e) {
            echo $e;
        }

        return (string)$response->getBody()->getContents();
    }

    public function getContent()
    {
        $urlResponse = $this->validateUrl();
        $xml = [];

        if (isset($urlResponse)) {
            $response = new SimpleXMLElement($urlResponse);
            $xml = $response;
        } else {
            echo 'error message - replace later';
        }

        return $xml;
    }


    public function formatContent(): array
    {
        $xml = $this->getContent();
        $currencies = [];

        foreach ($xml->Body->Cube->Rate as $currency) {
            $attributes = $currency->attributes();
            $currencies[(string)$attributes['currency']] = (string)$currency;
        }

        return $currencies;
    }
}