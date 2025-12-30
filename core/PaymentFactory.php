<?php

// Interface untuk metode pembayaran
interface PaymentMethod {
    public function prosesTransaksi($jumlah);
}

// Implementasi Transfer Bank
class BankTransfer implements PaymentMethod {
    public function prosesTransaksi($jumlah) {
        return "Memproses pembayaran via Transfer Bank sejumlah Rp. " . number_format($jumlah);
    }
}

// Implementasi COD
class COD implements PaymentMethod {
    public function prosesTransaksi($jumlah) {
        return "Memproses pembayaran Cash on Delivery sejumlah Rp. " . number_format($jumlah);
    }
}

// Implementasi E-Wallet
class EWallet implements PaymentMethod {
    public function prosesTransaksi($jumlah) {
        return "Memproses pembayaran via E-Wallet sejumlah Rp. " . number_format($jumlah);
    }
}

// Factory untuk membuat objek pembayaran
class PaymentFactory {
    public static function createPayment($type) {
        switch($type) {
            case 'bank_transfer':
                return new BankTransfer();
            case 'cod':
                return new COD();
            case 'ewallet':
                return new EWallet();
            default:
                throw new Exception("Metode pembayaran tidak valid");
        }
    }
}