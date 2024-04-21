<?php
class Database {
    private $connection;
    private $config;

    public function __construct() {
        // Load configuration settings
        $this->config = require 'config.php';
        // Establish a database connection
        $this->connect();
    }

    private function connect() {
        // Retrieve database configuration
        $dbConfig = $this->config['database'];
        // Create a new MySQLi instance
        $this->connection = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['dbname']);
        
        // Handle connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        // Set the character set to utf8mb4 for Unicode support
        $this->connection->set_charset('utf8mb4');
    }

    public function q($sql, $params = []) {
        // Prepare the SQL statement
        $stmt = $this->connection->prepare($sql);
        if ($stmt === false) {
            die('MySQL prepare error: ' . $this->connection->error);
        }

        // Bind parameters if any
        if ($params) {
            $types = $this->getParamTypes($params);
            $stmt->bind_param($types, ...$params);
        }

        // Execute the prepared statement
        $stmt->execute();

        // Handle execution errors
        if ($stmt->error) {
            die('Execute error: ' . $stmt->error);
        }

        // Fetch the result
        $result = $stmt->get_result();
        $stmt->close();

        // Return fetched data as an associative array or null if no data
        return $result ? $result->fetch_all(MYSQLI_ASSOC) : null;
    }

    private function getParamTypes($params) {
        $types = '';
        foreach ($params as $param) {
            switch (gettype($param)) {
                case 'integer':
                    $types .= 'i'; // Integer
                    break;
                case 'double':
                    $types .= 'd'; // Double
                    break;
                case 'string':
                    $types .= 's'; // String
                    break;
                default:
                    $types .= 'b'; // Blob and other types
                    break;
            }
        }
        return $types;
    }

    public function __destruct() {
        // Close the database connection when the object is destroyed
        $this->connection->close();
    }
}
