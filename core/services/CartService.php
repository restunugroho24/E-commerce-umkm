<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/OrderDetail.php';
require_once __DIR__ . '/../models/Product.php';
require_once __DIR__ . '/../controllers/CartController.php';

class CartService {
    private $order;
    private $detail;
    private $product;

    public function __construct() {
        $this->order = new Order();
        $this->detail = new OrderDetail();
        $this->product = new Product();
    }

    public function addItem($orderId, $productId, $qty) {
        if (!$this->product->checkAvailability($productId, $qty)) return false;
        $price = $this->product->getProductPrice($productId);
        $total = $price * $qty;
        $data = [
            'id_detail' => uniqid('dt_'),
            'id_pesanan' => $orderId,
            'id_produk' => $productId,
            'total_harga' => $total,
            'jumlah' => $qty
        ];
        $this->detail->addDetail($data);
        $subtotal = $this->detail->calculateSubtotal($orderId);
        $this->order->query("UPDATE pesanan SET total_pesanan={$subtotal} WHERE id_pesanan='" . $this->order->escape($orderId) . "'");
        return true;
    }

    public function updateItem($id_detail, $qty) {
        $detailRes = $this->detail->query("SELECT * FROM detail_pesanan WHERE id_detail='" . $this->detail->escape($id_detail) . "'");
        $row = $this->detail->fetch($detailRes);
        if (!$row) return false;
        if (!$this->product->checkAvailability($row['id_produk'], $qty)) return false;
        $price = $this->product->getProductPrice($row['id_produk']);
        $total = $price * (int)$qty;
        $this->detail->updateQuantity($id_detail, $qty);
        $this->detail->query("UPDATE detail_pesanan SET total_harga={$total} WHERE id_detail='" . $this->detail->escape($id_detail) . "'");
        $orderId = $row['id_pesanan'];
        $subtotal = $this->detail->calculateSubtotal($orderId);
        $this->order->query("UPDATE pesanan SET total_pesanan={$subtotal} WHERE id_pesanan='" . $this->order->escape($orderId) . "'");
        return true;
    }

    public function removeItem($id_detail) {
        return (new CartController())->removeItem($id_detail);
    }

    public function getItems($orderId) {
        return $this->detail->getByOrder($orderId);
    }
}
