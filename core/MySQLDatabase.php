<?php

require_once 'interfaces/DatabaseInterface.php';

class MySQLDatabase implements DatabaseInterface {
    private $connection;
    private $host;
    private $username;
    private $password;
    private $database;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        $this->connection = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
        
        if (!$this->connection) {
            throw new Exception("Koneksi database gagal: " . mysqli_connect_error());
        }
        
        return $this->connection;
    }

    public function query($sql) {
        return mysqli_query($this->connection, $sql);
    }

    public function fetch($result) {
        return mysqli_fetch_assoc($result);
    }

    public function close() {
        if ($this->connection) {
            mysqli_close($this->connection);
        }
    }
}