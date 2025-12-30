<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel {
    public function getById($id) {
        $id = $this->escape($id);
        $res = $this->query("SELECT * FROM users WHERE id_user='{$id}'");
        return $this->fetch($res);
    }

    public function create($data) {
        $name = $this->escape($data['name']);
        $email = $this->escape($data['email']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES ('{$name}','{$email}','{$password}')";
        return $this->query($sql);
    }

    public function authenticate($email, $password) {
        $email = $this->escape($email);
        $res = $this->query("SELECT * FROM users WHERE email='{$email}'");
        $row = $this->fetch($res);
        if ($row && password_verify($password, $row['password'])) return $row;
        return false;
    }
}
