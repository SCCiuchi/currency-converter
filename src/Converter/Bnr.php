<?php

namespace App\Converter;

use App\Core\Services\RateProviderService\RateCollection;
use App\Core\Services\RateProviderService\XMLReader;
use App\Core\Interfaces\RateCollectionInterface;

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

//        var_dump($data);
        if (isset($data)) {
            foreach ($data->Body->Cube->Rate as $currency) {
                $attributes = $currency->attributes();
                var_dump($data->Body->Cube->Rate);
                $currencies[(string)$attributes['currency']] = (float)$attributes['rate'];

            }
            foreach ($currencies as $key => $value) {
                $collection->addCurrency($key, $value);
//                var_dump($collection);

            }
        }
//        var_dump($collection);
        return $collection;
    }
}