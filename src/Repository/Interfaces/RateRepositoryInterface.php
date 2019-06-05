<?php

namespace App\Repository\Interfaces;

interface RateRepositoryInterface
{
    public function find(string $date);
    public function save(array $rate);
}