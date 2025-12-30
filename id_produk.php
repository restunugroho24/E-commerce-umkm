<?php
// core/models/Product.php
require_once 'BaseModel.php';

class Product extends BaseModel {
    public $id_produk;
    public $id_kategori;
    public $nama_produk;
    public $deskripsi_produk;
    public $harga_produk;
    public $stok_produk;
    public $gambar_produk;

    public function getProductDetails($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM produk WHERE id_produk={$id}");
        return $this->fetch($res);
    }

    public function updateStock($id, $quantity) {
        $id = (int)$id; $qty = (int)$quantity;
        return $this->query("UPDATE produk SET stok_produk = stok_produk - {$qty} WHERE id_produk = {$id}");
    }

    public function checkAvailability($id, $quantity) {
        $p = $this->getProductDetails($id);
        return $p && ($p['stok_produk'] >= $quantity);
    }

    public function getProductPrice($id) {
        $p = $this->getProductDetails($id);
        return $p ? (float)$p['harga_produk'] : 0.0;
    }
}