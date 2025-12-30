<?php
require_once 'core/init.php';
require_once 'core/models/Order.php';
require_once 'core/models/OrderDetail.php';
require_once 'core/models/Proof.php';
require_once 'core/models/Admin.php';
require_once 'core/models/Product.php';
require_once 'core/models/Category.php';

$controller = new CartController();
$orderModel = new Order();
$orderDetail = new OrderDetail();
$proofModel = new Proof();
$adminModel = new Admin();
$productModel = new Product();
$categoryModel = new Category();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = isset($_POST['action']) ? $_POST['action'] : '';
    if ($action === 'update_quantity') {
        $id_detail = isset($_POST['id_detail']) ? $_POST['id_detail'] : null;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        $ok = $controller->updateQuantity($id_detail, $quantity);
        if ($ok) {
            header('Location: cart_edit.php?msg=updated'); exit;
        } else {
            header('Location: cart_edit.php?msg=error'); exit;
        }
    } elseif ($action === 'remove_item') {
        $id_detail = isset($_POST['id_detail']) ? $_POST['id_detail'] : null;
        $controller->removeItem($id_detail);
        header('Location: cart_edit.php?msg=removed'); exit;
    }
}

// tampilkan keranjang (simple)
$orderId = isset($_GET['order_id']) ? $_GET['order_id'] : null;
$items = $orderId ? $controller->getCartItems($orderId) : [];
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Edit Cart</title></head>
<body>
<h1>Edit Keranjang</h1>
<?php if(isset($_GET['msg'])) echo '<p>' . htmlspecialchars($_GET['msg']) . '</p>'; ?>
<?php if (!$orderId): ?>
<p>Order ID tidak diberikan. Tambahkan ?order_id=ID di URL.</p>
<?php else: ?>
<table border="1" cellpadding="6">
    <tr><th>Produk</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr>
    <?php foreach($items as $it): ?>
    <tr>
        <td><?php echo htmlspecialchars($it['id_produk']); ?></td>
        <td>
            <form method="post" style="display:inline">
                <input type="hidden" name="action" value="update_quantity">
                <input type="hidden" name="id_detail" value="<?php echo htmlspecialchars($it['id_detail']); ?>">
                <input type="number" name="quantity" value="<?php echo htmlspecialchars($it['jumlah']); ?>" min="1">
                <button type="submit">Update</button>
            </form>
        </td>
        <td><?php echo htmlspecialchars($it['total_harga']); ?></td>
        <td>
            <form method="post" style="display:inline">
                <input type="hidden" name="action" value="remove_item">
                <input type="hidden" name="id_detail" value="<?php echo htmlspecialchars($it['id_detail']); ?>">
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>
</body>
</html><?php
// core/models/Order.php
require_once 'BaseModel.php';
require_once 'OrderDetail.php';

class Order extends BaseModel {
    public $id_pesanan;
    public $tanggal_pesanan;
    public $status_pesanan;
    public $total_pesanan;

    public function createOrder($data) {
        // $data: ['id_pesanan'=>..., 'tanggal_pesanan'=>..., 'total_pesanan'=>...]
        $id = $this->escape($data['id_pesanan']);
        $tgl = $this->escape($data['tanggal_pesanan']);
        $total = (float)$data['total_pesanan'];
        $sql = "INSERT INTO pesanan (id_pesanan, tanggal_pesanan, total_pesanan, status_pesanan)
                VALUES ('{$id}','{$tgl}', {$total}, 'Menunggu Pembayaran')";
        return $this->query($sql);
    }

    public function getById($id) {
        $id = $this->escape($id);
        $res = $this->query("SELECT * FROM pesanan WHERE id_pesanan='{$id}'");
        return $this->fetch($res);
    }

    public function processPayment($id) {
        $id = $this->escape($id);
        return $this->query("UPDATE pesanan SET status_pesanan='Diproses' WHERE id_pesanan='{$id}'");
    }

    public function cancelOrder($id) {
        $id = $this->escape($id);
        return $this->query("UPDATE pesanan SET status_pesanan='Dibatalkan' WHERE id_pesanan='{$id}'");
    }
}

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

// core/models/Category.php
require_once 'BaseModel.php';

class Category extends BaseModel {
    public $id_kategori;
    public $nama_kategori;
    public $deskripsi_kategori;

    public function getById($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM kategori WHERE id_kategori = {$id}");
        return $this->fetch($res);
    }

    public function getCategoryProducts($id) {
        $id = (int)$id;
        $res = $this->query("SELECT * FROM produk WHERE id_kategori = {$id}");
        $rows = [];
        while ($r = $this->fetch($res)) $rows[] = $r;
        return $rows;
    }

    public function addProductToCategory($productId, $categoryId) {
        $productId = (int)$productId; $categoryId = (int)$categoryId;
        return $this->query("UPDATE produk SET id_kategori={$categoryId} WHERE id_produk={$productId}");
    }
}

// core/models/BaseModel.php
require_once __DIR__ . '/../../core/Database.php';

class BaseModel {
    protected $db; // mysqli connection

    public function __construct() {
        $this->db = \Database::getInstance()->getConnection();
    }

    protected function query($sql) {
        return mysqli_query($this->db, $sql);
    }

    protected function fetch($res) {
        return $res ? mysqli_fetch_assoc($res) : null;
    }

    protected function escape($v) {
        return mysqli_real_escape_string($this->db, $v);
    }
}
