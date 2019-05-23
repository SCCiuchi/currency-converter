<?php

namespace App\Repository;

use App\Repository\Interfaces\RateRepositoryInterface;
use App\Services\Database\DbConnection;

class RateRepository implements RateRepositoryInterface
{
    /** @var DbConnection */
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection->getConnection();
    }

    public function find(string $date)
    {
        return $this->dbConnection->find($date);
    }

    public function save(array $rate)
    {
    }
}