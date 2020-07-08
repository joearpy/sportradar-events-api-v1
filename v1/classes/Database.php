<?php

class Database {

    public PDO $pdo;
    
    private const HOST = "localhost";
    private const DB_NAME = "sport_events";
    private const USERNAME = "root";
    private const PASS = "";

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=" . self::HOST . ";dbname=" . self::DB_NAME, self::USERNAME, self::PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}