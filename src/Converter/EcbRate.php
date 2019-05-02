<?php

namespace App\Converter;

use App\Interfaces\Rate;
use App\View\Template;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use SimpleXMLElement;

class EcbRate implements Rate
{
    private const URL = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';

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
            echo 'error msg - replace later';
        }

        return $xml;
    }

    public function formatContent():array
    {
        $xml = $this->getContent();
        $currencies = [];

        if (isset($xml)) {
            foreach ($xml->Cube->Cube->Cube as $currency) {
                $attributes = $currency->attributes();
                $currencies[(string)$attributes['currency']] = (string)$attributes['rate'];
            }
        }

        return $currencies;
    }
}