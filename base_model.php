<?php
// core/models/BaseModel.php
require_once __DIR__ . '/../../core/Database.php';

class BaseModel {
    protected $db; // mysqli connection

    public function __construct() {
        $this->db = \Database::getInstance()->getConnection();
    }

    protected function query($sql) {
        return mysqli_query($this->db, $sql);
    }

    protected function fetch($res) {
        return $res ? mysqli_fetch_assoc($res) : null;
    }

    protected function escape($v) {
        return mysqli_real_escape_string($this->db, $v);
    }
}