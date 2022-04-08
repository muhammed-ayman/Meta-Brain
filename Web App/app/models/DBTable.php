<?php

  namespace App\Models;
  use \PDO;

  class DBTable {
    // DB Vars
    protected $conn;
    protected $table;
    protected $table_keys;

    protected function table_exists()
    {
      $tables = $this->conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_GROUP);
      if (!in_array($this->table, array_keys($tables))) {
        return FALSE;
      }

      return TRUE;
    }

    // GET BY DIFFERENT PARAMETERS
    public function get_by($para, $value)
    {
      $res = null;

      if (in_array($para, $this->table_keys)) {
        $query = "SELECT * FROM `$this->table` WHERE $para='" . $value . "'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      }

      return $res;
    }

  }
