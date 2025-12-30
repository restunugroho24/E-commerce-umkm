<?php
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Category.php';

class ProductService {
    private $product;

    public function __construct() {
        $this->product = new Product();
    }

    public function getProduct($id) {
        return $this->product->getProductDetails($id);
    }

    public function listByCategory($categoryId) {
        $catModel = new Category();
        return $catModel->getCategoryProducts($categoryId);
    }

    public function reduceStock($id, $qty) {
        return $this->product->updateStock($id, $qty);
    }

    public function isAvailable($id, $qty) {
        return $this->product->checkAvailability($id, $qty);
    }
}
