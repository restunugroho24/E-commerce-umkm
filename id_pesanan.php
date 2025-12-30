<?php
// core/models/Order.php
require_once 'BaseModel.php';
require_once 'OrderDetail.php';

class Order extends BaseModel {
    public $id_pesanan;
    public $tanggal_pesanan;
    public $status_pesanan;
    public $total_pesanan;

    public function createOrder($data) {
        // $data: ['id_pesanan'=>..., 'tanggal_pesanan'=>..., 'total_pesanan'=>...]
        $id = $this->escape($data['id_pesanan']);
        $tgl = $this->escape($data['tanggal_pesanan']);
        $total = (float)$data['total_pesanan'];
        $sql = "INSERT INTO pesanan (id_pesanan, tanggal_pesanan, total_pesanan, status_pesanan)
                VALUES ('{$id}','{$tgl}', {$total}, 'Menunggu Pembayaran')";
        return $this->query($sql);
    }

    public function getById($id) {
        $id = $this->escape($id);
        $res = $this->query("SELECT * FROM pesanan WHERE id_pesanan='{$id}'");
        return $this->fetch($res);
    }

    public function processPayment($id) {
        $id = $this->escape($id);
        return $this->query("UPDATE pesanan SET status_pesanan='Diproses' WHERE id_pesanan='{$id}'");
    }

    public function cancelOrder($id) {
        $id = $this->escape($id);
        return $this->query("UPDATE pesanan SET status_pesanan='Dibatalkan' WHERE id_pesanan='{$id}'");
    }
}