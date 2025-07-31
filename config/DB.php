<?php

class DB {
    public static function getConnection() {
        $servername = $_ENV['PMA_HOST'];
        $username = $_ENV['MYSQL_USER'];
        $password = $_ENV['MYSQL_PASSWORD'];
        $dbname = $_ENV['MYSQL_DATABASE'];

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión a la BD falida: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>