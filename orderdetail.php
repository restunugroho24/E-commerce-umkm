<?php
// core/models/OrderDetail.php
require_once 'BaseModel.php';

class OrderDetail extends BaseModel {
    public function addDetail($data) {
        // $data: ['id_detail'=>..., 'id_pesanan'=>..., 'id_produk'=>..., 'total_harga'=>..., 'jumlah'=>...]
        $id_detail = $this->escape($data['id_detail']);
        $id_pesanan = $this->escape($data['id_pesanan']);
        $id_produk = (int)$data['id_produk'];
        $total_harga = (float)$data['total_harga'];
        $jumlah = (int)$data['jumlah'];
        $sql = "INSERT INTO detail_pesanan (id_detail, id_pesanan, id_produk, total_harga, jumlah)
                VALUES ('{$id_detail}','{$id_pesanan}', {$id_produk}, {$total_harga}, {$jumlah})";
        return $this->query($sql);
    }

    public function calculateSubtotal($id_pesanan) {
        $id = $this->escape($id_pesanan);
        $res = $this->query("SELECT SUM(total_harga) as subtotal FROM detail_pesanan WHERE id_pesanan='{$id}'");
        $r = $this->fetch($res);
        return $r ? (float)$r['subtotal'] : 0.0;
    }
}