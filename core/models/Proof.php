<?php
require_once __DIR__ . '/BaseModel.php';

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

    public function deleteProof($id_bukti) {
        $id = $this->escape($id_bukti);
        return $this->query("DELETE FROM bukti WHERE id_bukti='{$id}'");
    }
}
