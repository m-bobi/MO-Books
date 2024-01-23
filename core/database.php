<?php

class Database
{
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'user_db';
    private $conn;

    public function tryConnection()
    {
        $this->conn = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

// Instantiate the Database class
$database = new Database();

// Ensure that the database connection is established
$database->tryConnection();

// Get the connection object for procedural usage
$conn = $database->getConnection();
?>