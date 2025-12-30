<?php
require_once __DIR__ . '/../../core/Database.php';

class BaseModel {
    protected $db;
    protected $conn;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->conn = $this->db->getConnection();
    }

    protected function query($sql) {
        return mysqli_query($this->conn, $sql);
    }

    protected function fetch($res) {
        return $res ? mysqli_fetch_assoc($res) : null;
    }

    protected function fetchAll($res) {
        $rows = [];
        if ($res) while ($r = mysqli_fetch_assoc($res)) $rows[] = $r;
        return $rows;
    }

    protected function escape($v) {
        return mysqli_real_escape_string($this->conn, $v);
    }
}
