<?php
// core/models/Admin.php
require_once 'BaseModel.php';

class Admin extends BaseModel {
    public function login($username, $password) {
        $u = $this->escape($username);
        $p = $this->escape($password);
        $res = $this->query("SELECT * FROM admin WHERE username_admin='{$u}' AND password_admin='{$p}'");
        return $this->fetch($res);
    }

    public function updateProfile($id_admin, $data) {
        $id = (int)$id_admin;
        $username = $this->escape($data['username']);
        $password = $this->escape($data['password']);
        return $this->query("UPDATE admin SET username_admin='{$username}', password_admin='{$password}' WHERE id_admin={$id}");
    }
}