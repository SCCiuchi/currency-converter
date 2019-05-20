<?php

namespace Core\Services\RateService;

class RateCollection implements  \Iterator
{
    protected $data = [];   
    private $index = 0;

    public function __construct()
    {
        $this->index = 0;
    }

    public function addCurrency(string $currency, float $rate): void
    {
        $this->data[] = [
            "label" => $currency,
            "value" => $rate
        ];
    }

    public function findSelectedCurrency(string $currency)
    {
        foreach ($this->data as $item) {
            if ($item['label'] == $currency) {
                return $item;
            }
        }
    }

    public function getRates(): array
    {
        return $this->data;
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