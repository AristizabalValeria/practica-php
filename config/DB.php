<?php
class DB {
    public static function getConnection() {
        $servername = 'db';  // localhost
        $username = 'root';
        $password = '123456';
        $dbname = 'dofirest_db_prueba';

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Conexión a la BD fallida: " . $conn->connect_error);
        }
        return $conn;
    }
}

?>