<?php

class Order {
    private $orderId;
    private $customerName;
    private $products = [];
    private $shippingAddress;
    private $paymentMethod;
    private $shippingMethod;
    private $note;
    private $totalAmount;

    public function setOrderId($orderId) {
        $this->orderId = $orderId;
    }

    public function setCustomerName($customerName) {
        $this->customerName = $customerName;
    }

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function setShippingAddress($address) {
        $this->shippingAddress = $address;
    }

    public function setPaymentMethod($method) {
        $this->paymentMethod = $method;
    }

    public function setShippingMethod($method) {
        $this->shippingMethod = $method;
    }

    public function setNote($note) {
        $this->note = $note;
    }

    public function setTotalAmount($amount) {
        $this->totalAmount = $amount;
    }

    public function getOrderDetails() {
        return [
            'order_id' => $this->orderId,
            'customer_name' => $this->customerName,
            'products' => $this->products,
            'shipping_address' => $this->shippingAddress,
            'payment_method' => $this->paymentMethod,
            'shipping_method' => $this->shippingMethod,
            'note' => $this->note,
            'total_amount' => $this->totalAmount
        ];
    }
}

class OrderBuilder {
    private $order;

    public function __construct() {
        $this->order = new Order();
    }

    public function setOrderId($orderId) {
        $this->order->setOrderId($orderId);
        return $this;
    }

    public function setCustomerName($name) {
        $this->order->setCustomerName($name);
        return $this;
    }

    public function addProduct($product) {
        $this->order->addProduct($product);
        return $this;
    }

    public function setShippingAddress($address) {
        $this->order->setShippingAddress($address);
        return $this;
    }

    public function setPaymentMethod($method) {
        $this->order->setPaymentMethod($method);
        return $this;
    }

    public function setShippingMethod($method) {
        $this->order->setShippingMethod($method);
        return $this;
    }

    public function setNote($note) {
        $this->order->setNote($note);
        return $this;
    }

    public function setTotalAmount($amount) {
        $this->order->setTotalAmount($amount);
        return $this;
    }

    public function build() {
        return $this->order;
    }
}