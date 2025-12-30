<?php
require_once __DIR__ . '/../models/Order.php';
require_once __DIR__ . '/../models/OrderDetail.php';
require_once __DIR__ . '/../models/Product.php';

class OrderService {
    private $order;
    private $detail;
    private $product;

    public function __construct() {
        $this->order = new Order();
        $this->detail = new OrderDetail();
        $this->product = new Product();
    }

    public function createOrder($orderData, $items) {
        // orderData: ['id_pesanan','tanggal_pesanan','total_pesanan']
        $this->order->createOrder($orderData);
        foreach ($items as $it) {
            $this->detail->addDetail($it);
            $this->product->updateStock($it['id_produk'], $it['jumlah']);
        }
        return true;
    }

    public function cancelOrder($id) {
        return $this->order->cancelOrder($id);
    }

    public function getOrder($id) {
        return $this->order->getById($id);
    }
}
