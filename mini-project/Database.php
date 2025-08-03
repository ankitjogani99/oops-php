<?php
// Singleton: Only one DB connection for the entire app
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Simulated DB connection
        $this->connection = "Connected to MySQL Database";
    }

    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
