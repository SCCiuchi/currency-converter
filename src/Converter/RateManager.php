<?php

namespace App\Converter;

use App\Interfaces\Rate;
use http\Exception\BadUrlException;
use SimpleXMLElement;

class RateManager implements Rate
{
    public function getContent(string $url)
    {
        $pattern = "#((https?|ftp)://(\S*?\.\S*?))([\s)\[\]{},;\"\\':<]|\.\s | $)#i";

        try {
            if (!empty($url) && preg_match($pattern, $url))
            {
                $urlResponse = file_get_contents($url);
                $xml = new SimpleXMLElement($urlResponse);
            } else {
                throw new BadUrlException();
            }

        } catch (BadUrlException $e) {
            echo "The url you entered is invalid or the page was not found" . $e;
        }

        return $xml;
    }

    public function formatContent():array
    {
        $xml = $this->getContent();
        $currencies = [];

        foreach ($xml->Cube->Cube->Cube as $currency) {
            $attributes = $currency->attributes();
            $currencies[(string)$attributes['currency']] = (string)$attributes['rate'];
        }

        return $currencies;
    }
}