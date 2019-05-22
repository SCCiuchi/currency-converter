<?php

namespace App\Services\RateService;

class RateCollection implements  \Iterator
{
    protected $data = [];   
    private $index = 0;

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

    public function current(): array
    {
        return $this->data[$this->index];
    }

    public function key()
    {
        return $this->index;
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    public function valid()
    {
       return isset($this->data[$this->index]);
    }
}