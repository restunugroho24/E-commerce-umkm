<?php
require_once __DIR__ . '/BaseModel.php';

class Product extends BaseModel {
    public function getProductDetails($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM produk WHERE id_produk={$id}");
        return $this->fetch($res);
    }

    public function updateStock($id, $quantity) {
        $id = (int)$id;
        $qty = (int)$quantity;
        return $this->query("UPDATE produk SET stok_produk = GREATEST(0, stok_produk - {$qty}) WHERE id_produk = {$id}");
    }

    public function checkAvailability($id, $quantity) {
        $p = $this->getProductDetails($id);
        return $p && ((int)$p['stok_produk'] >= (int)$quantity);
    }

    public function getProductPrice($id) {
        $p = $this->getProductDetails($id);
        return $p ? (float)$p['harga_produk'] : 0.0;
    }
}
