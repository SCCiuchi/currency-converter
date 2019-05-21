<?php

namespace Core\Database;

use Config\ConfigReader\ConfigLoader;

class DbConnection
{
    private static $instance = null;
    private $conn;

    private function __construct()
    {
        $config = new ConfigLoader();

        $this->conn = new \PDO("mysql:host={$config->getConfigKeys('db')['host']};
        dbname={$config->getConfigKeys('db')['name']}",
            $config->getConfigKeys('db')['user'],
            $config->getConfigKeys('db')['password'],
        array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public static function getInstance(): self
    {
        if (!self::$instance) {
            self::$instance = new DbConnection();
        }

        return self::$instance;
    }

    public function getConnection(): \PDO
    {
        return $this->conn;
    }
}
