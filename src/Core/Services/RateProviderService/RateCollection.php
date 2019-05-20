<?php

namespace App\Core\Services\RateProviderService;

class RateCollection implements  \Iterator
{
    private $index = 0;
    protected $data = [];

    public function __construct()
    {
        $this->index = 0;
    }

    public function addCurrency(string $currency, float $rate): void
    {
//        $this->data[$currency] = $rate;
        $this->data[] = [
            "label" => $currency,
            "value" => $rate
        ];
    }

    public function getRates(): array
    {
        return $this->data;
    }

    public function findSelectedCurrency(string $currency)
    {
        foreach ($this->data as $item) {
            if ($item['label'] == $currency) {
                return $item;
            }
        }
    }

    public function current()
    {
        return $this->data[$this->index];
    }

    public function key()
    {
        return $this->index;
    }

    public function next()
    {
        ++$this->index;
    }

    public function rewind()
    {
        $this->index = 0;
    }

    public function valid()
    {
       return isset($this->data[$this->index]);
    }
}