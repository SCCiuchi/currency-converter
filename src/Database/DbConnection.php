<?php

namespace App\Database;

class DbConnection
{
    private static $instance = null;
    private $conn;

    private $host = '127.0.0.1';
    private $user = 'stefanciuchi';
    private $pass = 'parolasigura';
    private $name = 'currency_converter';

    private function __construct()
    {
        $this->conn = new \PDO("mysql:host={$this->host};
        dbname={$this->name}", $this->user, $this->pass,
        array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance(): self
    {
        if (!self::$instance)
        {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->conn;
    }
}