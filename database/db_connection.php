<?php

    function createDbConnection()
    {
        $servername = "127.0.0.1";
        $username = "stefanciuchi";
        $password = "password";
        $dbname = "currency_converter";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            error_log('MySQL Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
}