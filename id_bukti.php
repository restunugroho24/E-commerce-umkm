<?php
// core/models/Proof.php
require_once 'BaseModel.php';

class Proof extends BaseModel {
    public function uploadProof($id_pesanan, $filePath) {
        $id = $this->escape($id_pesanan);
        $file = $this->escape($filePath);
        return $this->query("INSERT INTO bukti (id_pesanan, foto_bukti) VALUES ('{$id}','{$file}')");
    }

    public function getProofByOrder($id_pesanan) {
        $id = $this->escape($id_pesanan);
        $res = $this->query("SELECT * FROM bukti WHERE id_pesanan='{$id}'");
        return $this->fetch($res);
    }
}