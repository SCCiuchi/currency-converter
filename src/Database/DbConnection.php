<?php

namespace App\Database;

class DbConnection
{
    public function connectToDb()
    {
        $host = '127.0.0.1';
        $db = 'currency_converter';
        $user = 'stefanciuchi';
        $pass = 'parolasigura';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = null;

        try {
            $pdo = new \PDO($dsn, $user, $pass, $options);
            if ($pdo) {
                echo 'db connection success!'; // debug - remove!
            }
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}