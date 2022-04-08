<?php

  namespace Config;
  use \PDO;

  class Database {
    // DB Parameters
    private $host;
    private $username;
    private $password;
    private $db;
    private $conn;

    function __construct()
    {
      global $HOST, $USERNAME, $PASSWORD, $DB_NAME;
      $this->host = $HOST;
      $this->username = $USERNAME;
      $this->password = $PASSWORD;
      $this->db = $DB_NAME;
    }

    // DB Connection
    public function connect()
    {
      $this->conn = null;

      try {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db , $this->username , $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo "Connection Error: $e";
      }

      return $this->conn;
    }

  }
