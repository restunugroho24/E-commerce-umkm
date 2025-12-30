<?php
require_once __DIR__ . '/../models/OrderDetail.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../models/Order.php';

class CartController {
    private $orderDetail;
    private $product;
    private $orderModel;

    public function __construct() {
        $this->orderDetail = new OrderDetail();
        $this->product = new Product();
        $this->orderModel = new Order();
    }

    public function updateQuantity($id_detail, $newQty) {
        $detail = $this->orderDetail->query("SELECT * FROM detail_pesanan WHERE id_detail='" . $this->orderDetail->escape($id_detail) . "'");
        $row = $this->orderDetail->fetch($detail);
        if (!$row) return false;
        $id_produk = (int)$row['id_produk'];

        if (!$this->product->checkAvailability($id_produk, $newQty)) {
            return false; // stok tidak cukup
        }

        $price = $this->product->getProductPrice($id_produk);
        $total = $price * (int)$newQty;

        $this->orderDetail->updateQuantity($id_detail, $newQty);
        $this->orderDetail->query("UPDATE detail_pesanan SET total_harga={$total} WHERE id_detail='" . $this->orderDetail->escape($id_detail) . "'");

        // update total pesanan
        $orderId = $row['id_pesanan'];
        $subtotal = $this->orderDetail->calculateSubtotal($orderId);
        $this->orderModel->query("UPDATE pesanan SET total_pesanan={$subtotal} WHERE id_pesanan='" . $this->orderModel->escape($orderId) . "'");
        return true;
    }

    public function removeItem($id_detail) {
        $detailRes = $this->orderDetail->query("SELECT * FROM detail_pesanan WHERE id_detail='" . $this->orderDetail->escape($id_detail) . "'");
        $row = $this->orderDetail->fetch($detailRes);
        if (!$row) return false;
        $orderId = $row['id_pesanan'];
        $this->orderDetail->removeDetail($id_detail);
        $subtotal = $this->orderDetail->calculateSubtotal($orderId);
        $this->orderModel->query("UPDATE pesanan SET total_pesanan={$subtotal} WHERE id_pesanan='" . $this->orderModel->escape($orderId) . "'");
        return true;
    }

    public function getCartItems($orderId) {
        return $this->orderDetail->getByOrder($orderId);
    }
}
