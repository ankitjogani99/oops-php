<?php

// Ensure only one instance of a class exists, and provide a global point of access to it.

// 🔹 Real-life use:
// Database connection
// Logger service
//Only one DB connection is maintained, saving memory and resources.
class Database {
    private static $instance = null;
    private $connection;

    private function __construct() {
        // Simulating DB connection
        $this->connection = "Connected to MySQL";
    }

    // Prevent cloning
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

// Usage
$db1 = Database::getInstance();
$db2 = Database::getInstance();

echo $db1->getConnection(); 
echo "\nSame instance? " . ($db1 === $db2 ? "Yes" : "No");
