<?php

namespace App\Converter;

use App\Services\RateService\RateCollection;
use Core\RateReader\XMLReader;
use App\Services\RateService\Interfaces\RateCollectionInterface;

class Bnr implements RateCollectionInterface
{
    /** @var XMLReader */
    private $xmlReader;

    public function __construct(XMLReader $xmlReader)
    {
        $this->xmlReader = $xmlReader;
    }

    public function getRate(): RateCollection
    {
        $url = 'https://www.bnr.ro/nbrfxrates.xml';
        $data = $this->xmlReader->getContent($url);
        $collection = new RateCollection();

        if (isset($data)) {
            foreach ($data->Body->Cube->Rate as $currency) {
                $attributes = $currency->attributes();
                $collection->addCurrency((string)$attributes['currency'], (float)$currency[0]->__toString());

            }
        }

        return $collection;
    }
}