<?php

namespace App\Converter;

use Core\Services\RateService\RateCollection;
use Core\Services\RateReader\XMLReader;
use Core\Services\Interfaces\RateCollectionInterface;

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
        $url = 'https://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $data = $this->xmlReader->getContent($url);
        $collection = new RateCollection();

        if (isset($data)) {
            foreach ($data->Cube->Cube->Cube as $currency) {
                $attributes = $currency->attributes();
                $collection->addCurrency((string)$attributes['currency'], (float)$attributes['rate']);
            }
        }

        return $collection;
    }
}