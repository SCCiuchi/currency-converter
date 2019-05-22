<?php

namespace App\Repository;

use App\Services\Database\DbConnection;

class Rate
{
    /** @var DbConnection */
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection->getConnection();
    }
}