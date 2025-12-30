<?php

class ProductService {
    private $db;

    // Dependency injection melalui constructor
    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        $result = $this->db->query($sql);
        
        $products = [];
        while ($row = $this->db->fetch($result)) {
            $products[] = $row;
        }
        
        return $products;
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = " . (int)$id;
        $result = $this->db->query($sql);
        return $this->db->fetch($result);
    }
}