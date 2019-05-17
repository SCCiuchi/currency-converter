<?php

namespace App\Converter;

use App\Core\Services\RateProviderService\RateCollection;
use App\Core\Services\RateProviderService\XMLReader;
use App\Core\Interfaces\RateCollectionInterface;

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
                $currencies[(string)$attributes['currency']] = (float)$attributes['rate'];
            }
            foreach ($currencies as $key => $value) {
                $collection->addCurrency($key, $value);
            }
        }

        return $collection;
    }
}