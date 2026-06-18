<?php

class Database {
    private $pdo;

    // Connect to the database upon instantiation
    public function __construct() {
        $host="localhost"; 
        $dbname = "minimart";
        $username = "root";
        $password = "";
        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";
        
        
        $options = [
            // Throw exceptions on errors so you can catch them
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            // Fetch results as an associative array by default
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Use real prepared statements (disables emulated prepares)
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            // In a real app, log this error instead of displaying it
            die("Database connection failed: " . $e->getMessage());
        }
    }

    
    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
    
    // Optional: Helper to get the last inserted ID
    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }
}