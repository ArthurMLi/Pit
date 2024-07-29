<?php

class Database {
    private static $conn;

    public static function getConnection() {
        if (self::$conn === null) {
            try {
                 $host = "localhost";
                 $db_name = "project_mvc";
                 $username = "root";
                 $password = "";

                self::$conn = new PDO($host, $db_name, $username, $password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>