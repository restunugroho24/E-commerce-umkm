<?php
require_once __DIR__ . '/BaseModel.php';

class Category extends BaseModel {
    public function getCategoryInfo($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM kategori WHERE id_kategori={$id}");
        return $this->fetch($res);
    }

    public function getCategoryProducts($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM produk WHERE id_kategori={$id}");
        return $this->fetchAll($res);
    }

    public function addProductToCategory($productId, $categoryId) {
        $productId = (int)$productId;
        $categoryId = (int)$categoryId;
        return $this->query("UPDATE produk SET id_kategori={$categoryId} WHERE id_produk={$productId}");
    }

    public function removeProductFromCategory($productId) {
        $productId = (int)$productId;
        return $this->query("UPDATE produk SET id_kategori=NULL WHERE id_produk={$productId}");
    }
}
