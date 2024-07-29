<?php

class Database {
    
    private static $conn;  
    public static function getConnection() {
        self::$conn = null;
        $host = 'localhost';
        $dbname = 'app_fila';
        $username = 'root';
        $password = '';   
        try {
            self::$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        
        return self::$conn;
    }
}
?>