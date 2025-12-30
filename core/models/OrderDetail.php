<?php
require_once __DIR__ . '/BaseModel.php';

class OrderDetail extends BaseModel {
    public function addDetail($data) {
        $id_detail = $this->escape($data['id_detail']);
        $id_pesanan = $this->escape($data['id_pesanan']);
        $id_produk = (int)$data['id_produk'];
        $total_harga = (float)$data['total_harga'];
        $jumlah = (int)$data['jumlah'];
        $sql = "INSERT INTO detail_pesanan (id_detail, id_pesanan, id_produk, total_harga, jumlah) VALUES ('{$id_detail}','{$id_pesanan}', {$id_produk}, {$total_harga}, {$jumlah})";
        return $this->query($sql);
    }

    public function calculateSubtotal($id_pesanan) {
        $id = $this->escape($id_pesanan);
        $res = $this->query("SELECT SUM(total_harga) as subtotal FROM detail_pesanan WHERE id_pesanan='{$id}'");
        $r = $this->fetch($res);
        return $r ? (float)$r['subtotal'] : 0.0;
    }

    public function updateQuantity($id_detail, $newQty) {
        $id = $this->escape($id_detail);
        $qty = (int)$newQty;
        return $this->query("UPDATE detail_pesanan SET jumlah={$qty} WHERE id_detail={$id}");
    }

    public function removeDetail($id_detail) {
        $id = $this->escape($id_detail);
        return $this->query("DELETE FROM detail_pesanan WHERE id_detail='{$id}'");
    }

    public function getByOrder($id_pesanan) {
        $id = $this->escape($id_pesanan);
        $res = $this->query("SELECT * FROM detail_pesanan WHERE id_pesanan='{$id}'");
        return $this->fetchAll($res);
    }
}
