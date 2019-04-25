<?php

    function createDbConnection()
    {
        $servername = "0.0.0.0";
        $username = "root";
        $password = "admin";
        $dbname = "db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            error_log('MySQL Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
}