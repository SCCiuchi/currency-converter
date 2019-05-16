<?php

namespace App\Converter;

use App\Core\Provider\RateCollection;
use App\Core\Provider\XMLReader;
use SimpleXMLElement;
use GuzzleHttp\Client;
use App\Interfaces\RateCollectionInterface;
use GuzzleHttp\Exception\ServerException;

class Ecb implements RateCollectionInterface
{
    /** @var XMLReader */
    private $xmlReader;

    public function __construct(XMLReader $xmlReader)
    {
        $this->xmlReader = $xmlReader;
    }

    public function getRate(): RateCollection
    {
        $data = $this->xmlReader->getContent('https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
        $collection = new RateCollection();

        foreach ($collection as $key => $value) {
            $currencyRates->addCurrency($key, $value);
        }
    }


    /*
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
    */
}